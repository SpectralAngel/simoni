<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Indira\SimoniBundle\Entity\Document;
use Indira\SimoniBundle\Entity\Denuncia;
use Indira\SimoniBundle\Entity\AvistamientoImportado;
use Indira\SimoniBundle\Form\DocumentType;

/**
 * Document controller.
 */
class DocumentController extends Controller
{
    /**
     * Lists all Document entities.
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IndiraSimoniBundle:Document')->findAll();

        return $this->render('IndiraSimoniBundle:Document:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function createAction(Request $request)
    {
        $entity  = new Document();
        $form = $this->createForm(new DocumentType(), $entity);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $entity->setUser($this->getUser());
            $em->persist($entity);
            $em->flush();
            
            $zona = $form['zona']->getData();
            $municipio = $form['municipio']->getData();
            $excel = $this->get('xls.load_xls5')->load($entity->getAbsolutePath());
            
            $data = $excel->getActiveSheet()->toArray();
            foreach(array_slice($data, 1) as $row)
            {
                $avistamiento = new AvistamientoImportado();
                
                $avistamiento->setZona($zona);
                $avistamiento->setMunicipio($municipio);
                
                $avistamiento->setNombreComun($row[1]);
                
                $avistamiento->setGenero($row[2]);
                $avistamiento->setEspecie($row[3]);
                $avistamiento->setLocalidad($row[4]);
                
                $fecha = \DateTime::createFromFormat('m-d-y H:i', $row[5].' '.$row[6]);
                $avistamiento->setFecha($fecha);
                $avistamiento->setLatitud($row[7]);
                $avistamiento->setLongitud($row[8]);
                
                $tipo = $em->getRepository('IndiraSimoniBundle:TipoAvistamiento')->find($row[9]);
                $avistamiento->setTipo($tipo);
                
                $sexo = $em->getRepository('IndiraSimoniBundle:Sexo')->find($row[10]);
                $avistamiento->setSexo($sexo);
                
                $edad = $em->getRepository('IndiraSimoniBundle:Edad')->find($row[11]);
                $avistamiento->setEdad($edad);
                
                $avistamiento->setCantidad($row[12]);
                $avistamiento->setComentario($row[13]);
                $avistamiento->setUsuario($this->getUser());
                
                $em->persist($avistamiento);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('document_show', array(
                'id' => $entity->getId()
            )));
        }

        return $this->render('IndiraSimoniBundle:Document:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function createDenunciaAction(Request $request)
    {
        $entity  = new Document();
        $form = $this->createForm(new DocumentType(), $entity);
        $form->bind($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $entity->setUser($this->getUser());
            $em->persist($entity);
            $em->flush();
            
            $zona = $form['zona']->getData();
            $municipio = $form['municipio']->getData();
            $excel = $this->get('xls.load_xls5')->load($entity->getAbsolutePath());
            
            $data = $excel->getActiveSheet()->toArray();
            foreach(array_slice($data, 1) as $row)
            {
                $denuncia = new Denuncia();
                
                $denuncia->setZona($zona);
                $denuncia->setMunicipio($municipio);
                
                $denuncia->setNombreComun($row[1]);
                
                $denuncia->setGenero($row[2]);
                $denuncia->setEspecie($row[3]);
                $denuncia->setLocalidad($row[4]);
                
                $fecha = \DateTime::createFromFormat('m-d-y H:i', $row[5].' '.$row[6]);
                $denuncia->setFecha($fecha);
                $denuncia->setLatitud($row[7]);
                $denuncia->setLongitud($row[8]);
                
                $tipo = $em->getRepository('IndiraSimoniBundle:TipoDenuncia')->find($row[9]);
                $denuncia->setTipo($tipo);
                
                $avistamiento->setComentario($row[13]);
                $avistamiento->setUsuario($this->getUser());
                
                $em->persist($avistamiento);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('document_show', array(
                'id' => $entity->getId()
            )));
        }

        return $this->render('IndiraSimoniBundle:Document:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function newAction()
    {
        $entity = new Document();
        $form   = $this->createForm(new DocumentType(), $entity);

        return $this->render('IndiraSimoniBundle:Document:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        #$excel = $this->get('xls.load_xls5')->load($entity->getAbsolutePath());
        #print_r($data = $excel->getActiveSheet()->toArray());
        
        return $this->render('IndiraSimoniBundle:Document:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Displays a form to edit an existing Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $editForm = $this->createForm(new DocumentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IndiraSimoniBundle:Document:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IndiraSimoniBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DocumentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            
            $entity->upload();
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('document_edit', array('id' => $id)));
        }

        return $this->render('IndiraSimoniBundle:Document:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Document entity.
     * @Secure(roles="ROLE_USER")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IndiraSimoniBundle:Document')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Document entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('document'));
    }

    /**
     * Creates a form to delete a Document entity by id.
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
