<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\SubDimension;
use Indira\SimoniBundle\Form\SubDimensionType;

/**
 * SubDimension controller.
 *
 */
class SubDimensionController extends Controller
{
    /**
     * Lists all SubDimension entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:SubDimension')->findAll();

        return $this->render('IndiraSimoniBundle:SubDimension:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new SubDimension entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new SubDimension();
        $form = $this->createForm(new SubDimensionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subdimension_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:SubDimension:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new SubDimension entity.
     *
     */
    public function newAction()
    {
        $entity = new SubDimension();
        $form   = $this->createForm(new SubDimensionType(), $entity);

        return $this->render('IndiraSimoniBundle:SubDimension:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SubDimension entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:SubDimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubDimension entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:SubDimension:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SubDimension entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:SubDimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubDimension entity.');
        }

        $editForm = $this->createForm(new SubDimensionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:SubDimension:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing SubDimension entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:SubDimension')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SubDimension entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SubDimensionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subdimension_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:SubDimension:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SubDimension entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:SubDimension')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SubDimension entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subdimension'));
    }

    /**
     * Creates a form to delete a SubDimension entity by id.
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
