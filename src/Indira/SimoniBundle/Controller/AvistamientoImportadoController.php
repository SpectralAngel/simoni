<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Indira\SimoniBundle\Entity\AvistamientoImportado;
use Indira\SimoniBundle\Form\AvistamientoImportadoType;
use Indira\SimoniBundle\Form\AvistamientoImportadoReinoType;

/**
 * AvistamientoImportado controller.
 *
 */
class AvistamientoImportadoController extends Controller
{
    /**
     * Lists all AvistamientoImportado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reinos = $em->getRepository('IndiraSimoniBundle:Reino')->findAll();
        $entities = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->findAll();

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:index.html.twig', array(
            'entities' => $entities,
            'reinos' => $reinos
        ));
    }

    /**
     * Creates a new AvistamientoImportado entity.
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
     *
     */
    public function createReinoAction(Request $request, $reino)
    {
        $entity  = new AvistamientoImportado();
        $form = $this->createForm(new AvistamientoImportadoType(), $entity);
        $form->bind($request);
        $em = $this->getDoctrine()->getManager();
        $reino = $em->getRepository('IndiraSimoniBundle:Reino')->find($reino);

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
            'reino' => $reino
        ));
    }
    
    public function newReinoAction($reino)
    {
        $em = $this->getDoctrine()->getManager();
        $reino = $em->getRepository('IndiraSimoniBundle:Reino')->find($reino);
        
        $entity = new AvistamientoImportado();
        $form   = $this->createForm(new AvistamientoImportadoReinoType($reino), $entity);

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:newReino.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'reino' => $reino
        ));
    }

    /**
     * Displays a form to create a new AvistamientoImportado entity.
     *
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
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:AvistamientoImportado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AvistamientoImportado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:AvistamientoImportado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AvistamientoImportado entity.
     *
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
     *
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
     *
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
