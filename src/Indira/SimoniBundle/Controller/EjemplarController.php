<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\Ejemplar;
use Indira\SimoniBundle\Form\EjemplarType;

/**
 * Ejemplar controller.
 *
 */
class EjemplarController extends Controller
{
    /**
     * Lists all Ejemplar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:Ejemplar')->findAll();

        return $this->render('IndiraSimoniBundle:Ejemplar:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Ejemplar entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ejemplar();
        $form = $this->createForm(new EjemplarType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ejemplar_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:Ejemplar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Ejemplar entity.
     *
     */
    public function newAction()
    {
        $entity = new Ejemplar();
        $form   = $this->createForm(new EjemplarType(), $entity);

        return $this->render('IndiraSimoniBundle:Ejemplar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ejemplar entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Ejemplar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ejemplar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Ejemplar:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Ejemplar entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Ejemplar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ejemplar entity.');
        }

        $editForm = $this->createForm(new EjemplarType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Ejemplar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ejemplar entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Ejemplar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ejemplar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EjemplarType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ejemplar_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:Ejemplar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ejemplar entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:Ejemplar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ejemplar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ejemplar'));
    }

    /**
     * Creates a form to delete a Ejemplar entity by id.
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
