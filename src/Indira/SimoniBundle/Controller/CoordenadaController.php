<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\Coordenada;
use Indira\SimoniBundle\Form\CoordenadaType;

/**
 * Coordenada controller.
 *
 */
class CoordenadaController extends Controller
{
    /**
     * Lists all Coordenada entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:Coordenada')->findAll();

        return $this->render('IndiraSimoniBundle:Coordenada:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Coordenada entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Coordenada();
        $form = $this->createForm(new CoordenadaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('coordenada_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:Coordenada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Coordenada entity.
     *
     */
    public function newAction()
    {
        $entity = new Coordenada();
        $form   = $this->createForm(new CoordenadaType(), $entity);

        return $this->render('IndiraSimoniBundle:Coordenada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Coordenada entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Coordenada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coordenada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Coordenada:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Coordenada entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Coordenada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coordenada entity.');
        }

        $editForm = $this->createForm(new CoordenadaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Coordenada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Coordenada entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Coordenada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coordenada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CoordenadaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('coordenada_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:Coordenada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Coordenada entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:Coordenada')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Coordenada entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('coordenada'));
    }

    /**
     * Creates a form to delete a Coordenada entity by id.
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
