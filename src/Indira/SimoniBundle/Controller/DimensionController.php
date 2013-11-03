<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\Dimension;
use Indira\SimoniBundle\Form\DimensionType;

/**
 * Dimension controller.
 *
 */
class DimensionController extends Controller
{
    /**
     * Lists all Dimension entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('IndiraSimoniBundle:Dimension')->findAll();
        
        $entities = array_chunk($entities, 2);
        
        return $this->render('IndiraSimoniBundle:Dimension:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Creates a new Dimension entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Dimension();
        $form = $this->createForm(new DimensionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dimension_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:Dimension:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Dimension entity.
     *
     */
    public function newAction()
    {
        $entity = new Dimension();
        $form   = $this->createForm(new DimensionType(), $entity);

        return $this->render('IndiraSimoniBundle:Dimension:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Dimension entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Dimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dimension entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Dimension:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Dimension entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Dimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dimension entity.');
        }

        $editForm = $this->createForm(new DimensionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Dimension:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Dimension entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Dimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dimension entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DimensionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dimension_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:Dimension:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dimension entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:Dimension')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dimension entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dimension'));
    }

    /**
     * Creates a form to delete a Dimension entity by id.
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
