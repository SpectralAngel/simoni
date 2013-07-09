<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\TipoDenuncia;
use Indira\SimoniBundle\Form\TipoDenunciaType;

/**
 * TipoDenuncia controller.
 *
 */
class TipoDenunciaController extends Controller
{
    /**
     * Lists all TipoDenuncia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->findAll();

        return $this->render('IndiraSimoniBundle:TipoDenuncia:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new TipoDenuncia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TipoDenuncia();
        $form = $this->createForm(new TipoDenunciaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipodenuncia_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:TipoDenuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TipoDenuncia entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoDenuncia();
        $form   = $this->createForm(new TipoDenunciaType(), $entity);

        return $this->render('IndiraSimoniBundle:TipoDenuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoDenuncia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDenuncia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:TipoDenuncia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TipoDenuncia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDenuncia entity.');
        }

        $editForm = $this->createForm(new TipoDenunciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:TipoDenuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TipoDenuncia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDenuncia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoDenunciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipodenuncia_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:TipoDenuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoDenuncia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoDenuncia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipodenuncia'));
    }

    /**
     * Creates a form to delete a TipoDenuncia entity by id.
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
