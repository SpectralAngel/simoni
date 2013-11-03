<?php

namespace Indira\SimoniBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class AtributoClaveAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('descripcion');
        $formMapper->add('beneficiario');
        $formMapper->add('base', 'sonata_type_model');
        $formMapper->add('datos', 'sonata_type_model');
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('descripcion');
        $datagridMapper->add('beneficiario');
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('descripcion');
        $listMapper->add('beneficiario');
        $listMapper->add('base');
        $listMapper->add('datos');
    }
}
