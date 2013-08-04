<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Indira\SimoniBundle\Entity\Denuncia;
use Indira\SimoniBundle\Form\DenunciaType;

/**
 * Denuncia controller.
 *
 */
class DenunciaController extends Controller
{
    /**
     * Lists all Denuncia entities.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:Denuncia')->findAll();

        return $this->render('IndiraSimoniBundle:Denuncia:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Denuncia();
        $form = $this->createForm(new DenunciaType(), $entity);
        $form->bind($request);
        $map = $this->get('ivory_google_map.map');

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUsuario($this->getUser());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('denuncia_show', array('id' => $entity->getId())));
        }

        return $this->render('IndiraSimoniBundle:Denuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'map' => $map,
        ));
    }

    /**
     * Displays a form to create a new Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function newAction()
    {
        $entity = new Denuncia();
        $form   = $this->createForm(new DenunciaType(), $entity);
        $map = $this->get('ivory_google_map.map');

        return $this->render('IndiraSimoniBundle:Denuncia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'map' => $map,
        ));
    }

    /**
     * Finds and displays a Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Denuncia')->find($id);
        $map = $this->get('ivory_google_map.map');
        $polyline = $this->get('ivory_google_map.polyline');

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncia entity.');
        }
        foreach($entity->getCoordenadas() as $coordenada)
        {
            $point = $coordenada->getPoint();
            $polyline->addCoordinate($point->Lat(), $point->Long(), true);
        }
        $map->addPolyline($polyline);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Denuncia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'map' => $map,
        ));
    }

    /**
     * Displays a form to edit an existing Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Denuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncia entity.');
        }

        $editForm = $this->createForm(new DenunciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Denuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Denuncia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DenunciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('denuncia_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:Denuncia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Denuncia entity.
     * @Secure(roles="ROLE_USER")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:Denuncia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Denuncia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('denuncia'));
    }

    /**
     * Creates a form to delete a Denuncia entity by id.
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
