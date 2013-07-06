<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}
