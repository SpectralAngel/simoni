<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\ImagenDenuncia;
use Indira\SimoniBundle\Form\ImagenDenunciaType;

/**
 * ImagenDenuncia controller.
 *
 */
class ImagenDenunciaController extends Controller
{
    /**
     * Lists all ImagenDenuncia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:ImagenDenuncia')->findAll();

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ImagenDenuncia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ImagenDenuncia();
        $form = $this->createForm(new ImagenDenunciaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagendenuncia_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ImagenDenuncia entity.
     *
     */
    public function newAction()
    {
        $entity = new ImagenDenuncia();
        $form   = $this->createForm(new ImagenDenunciaType(), $entity);

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ImagenDenuncia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:ImagenDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenDenuncia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ImagenDenuncia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:ImagenDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenDenuncia entity.');
        }

        $editForm = $this->createForm(new ImagenDenunciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ImagenDenuncia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:ImagenDenuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenDenuncia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ImagenDenunciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imagendenuncia_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:ImagenDenuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ImagenDenuncia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:ImagenDenuncia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ImagenDenuncia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('imagendenuncia'));
    }

    /**
     * Creates a form to delete a ImagenDenuncia entity by id.
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
