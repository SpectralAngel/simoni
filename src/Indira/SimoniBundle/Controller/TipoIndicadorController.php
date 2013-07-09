<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\TipoIndicador;
use Indira\SimoniBundle\Form\TipoIndicadorType;

/**
 * TipoIndicador controller.
 *
 */
class TipoIndicadorController extends Controller
{
    /**
     * Lists all TipoIndicador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:TipoIndicador')->findAll();

        return $this->render('IndiraSimoniBundle:TipoIndicador:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new TipoIndicador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TipoIndicador();
        $form = $this->createForm(new TipoIndicadorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoindicador_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:TipoIndicador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TipoIndicador entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoIndicador();
        $form   = $this->createForm(new TipoIndicadorType(), $entity);

        return $this->render('IndiraSimoniBundle:TipoIndicador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoIndicador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:TipoIndicador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TipoIndicador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
        }

        $editForm = $this->createForm(new TipoIndicadorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:TipoIndicador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TipoIndicador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoIndicadorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoindicador_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:TipoIndicador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoIndicador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:TipoIndicador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoindicador'));
    }

    /**
     * Creates a form to delete a TipoIndicador entity by id.
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
