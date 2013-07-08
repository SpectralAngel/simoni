<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IndiraSimoniBundle:Default:index.html.twig',
        array(
        ));
    }
    
    /**
     * Lists all AvistamientoImportado entities.
     * @Secure(roles="ROLE_USER")
     */
    public function registroAction()
    {
        
        
        $em = $this->getDoctrine()->getManager();
        $reinos = $em->getRepository('IndiraSimoniBundle:Reino')->findAll();
        //$entities = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->findAll();
        $qb = $em->createQueryBuilder();
        
        $resultados = array(
            //'entities' => $entities,
            'reinos' => $reinos
        );
        $qb->select('a')
            ->from('Indira\SimoniBundle\Entity\AvistamientoImportado', 'a')
            ->where('a.reino = :reino');
        foreach($reinos as $reino)
        {
            $query = $qb->setParameter('reino', $reino)->getQuery();
            $resultados[$reino->getNombre()] = $query->getResult();
        }
        
        return $this->render('IndiraSimoniBundle:Default:registro.html.twig',
                             $resultados);
    }
    
    public function getTokenAction()
    {
        return new Response($this->container->get('form.csrf_provider')
                            ->generateCsrfToken('authenticate')
                            );
    }
    
    /**
     * Lists all Oficio entities.
     *
     * @Route("/", name="oficio")
     * @Method("GET")
     * @Template()
     */
    public function searchAction(Request $request)
    {
        $form = $this->createEspecieSearchForm();
        $form->bind($request);
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        
        $query = $qb->select('a')
            ->from('Indira\SimoniBundle\Entity\AvistamientoImportado', 'a')
            ->where('LOWER(a.nombreCientifico) LIKE LOWER(:cientifico)')
            ->setParameter('cientifico', "%".$form->get('cientifico')->getData()."%")
            ->getQuery();
        
        $avistamientos = $query->getResult();
        
        return array(
            'avistamientos' => $avistamientos,
            'nombreCientifico' => $form->get('cientifico')->getData(),
        );
    }
    
    private function createEspecieSearchForm()
    {
        return $this->createFormBuilder(null, array('csrf_protection' => false))
        ->add('cientifico', 'textarea', array(
            'label' => 'Nombre Cientifico'
        ))
        ->getForm();
    }
    
    private function createSearchForm()
    {
        return $this->createFormBuilder()
        ->add('cientifico', 'textarea', array(
            'label' => 'Nombre Cientifico'
        ))
        ->add('municipio', 'entity', array(
            'class' => 'Indira\SimoniBundle\Entity\Municipio',
            )
        )
        ->add('clase', 'entity', array(
            'class' => 'Indira\SimoniBundle\Entity\Clase',
            )
        )
        ->add('deteccion', 'entity', array(
            'class' => 'Indira\SimoniBundle\Entity\TipoAvistamiento',
            )
        )
        ->getForm();
    }
}
