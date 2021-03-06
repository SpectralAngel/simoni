<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Indira\SimoniBundle\Entity\Ejemplar;
use Indira\SimoniBundle\Entity\AvistamientoImportado;
use Indira\SimoniBundle\Form\AvistamientoImportadoType;
use Indira\SimoniBundle\Form\AvistamientoImportadoReinoType;

/**
 * AvistamientoImportado controller.
 */
class AvistamientoImportadoController extends Controller
{
    /**
     * Lists all AvistamientoImportado entities.
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction()
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
        
        return $this->render('IndiraSimoniBundle:AvistamientoImportado:index.html.twig',
                             $resultados);
    }

    /**
     * Creates a new AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new AvistamientoImportado();
        $form = $this->createForm(new AvistamientoImportadoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUsuario($this->getUser());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avistamiento_importado_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createReinoAction(Request $request, $reino)
    {
        $entity  = new AvistamientoImportado();
        $form = $this->createForm(new AvistamientoImportadoReinoType($reino), $entity);
        $form->bind($request);
        $em = $this->getDoctrine()->getManager();
        $reino = $em->getRepository('IndiraSimoniBundle:Reino')->find($reino);
        $map = $this->get('ivory_google_map.map');
        
        if ($form->isValid()) {
            $entity->setUsuario($this->getUser());
            $entity->setReino($reino);
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('avistamiento_importado_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:newReino.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'reino' => $reino,
            'map' => $map,
        ));
    }
    /*
     * @Secure(roles="ROLE_USER")
     */
    public function newReinoAction($reino)
    {
        $em = $this->getDoctrine()->getManager();
        $reino = $em->getRepository('IndiraSimoniBundle:Reino')->find($reino);
        
        $entity = new AvistamientoImportado();
        $ejemplar = new Ejemplar();
        $entity->addEjemplare($ejemplar);
        $form   = $this->createForm(new AvistamientoImportadoReinoType($reino), $entity);
        $map = $this->get('ivory_google_map.map');

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:newReino.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'map' => $map,
            'reino' => $reino
        ));
    }

    /**
     * Displays a form to create a new AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     */
    public function newAction()
    {
        $entity = new AvistamientoImportado();
        $form   = $this->createForm(new AvistamientoImportadoType(), $entity);

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AvistamientoImportado entity.');
        }
        
        $point = $entity->getPoint();
        $map = $this->get('ivory_google_map.map');
        $marker = $this->get('ivory_google_map.marker');
        $marker->setPrefixJavascriptVariable('marker_');
        $marker->setPosition($point->Lat(), $point->Long(), true);
        $map->addMarker($marker);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'map' => $map,
            'point' => $point,
        ));
    }
    
    /**
     * Displays a form to edit an existing AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AvistamientoImportado entity.');
        }

        $editForm = $this->createForm(new AvistamientoImportadoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Edits an existing AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AvistamientoImportado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AvistamientoImportadoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avistamiento_importado_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AvistamientoImportado entity.
     * @Secure(roles="ROLE_USER")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AvistamientoImportado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('avistamiento_importado'));
    }

    /**
     * Creates a form to delete a AvistamientoImportado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
