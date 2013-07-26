<?php

namespace Indira\SimoniBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class BeneficiarioAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nombre');
        $formMapper->add('imagen');
        $formMapper->add('color');
        $formMapper->add('subdimension');
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nombre');
        $datagridMapper->add('imagen');
        $datagridMapper->add('color');
        $datagridMapper->add('subdimension');
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nombre');
        $listMapper->add('imagen');
        $listMapper->add('color');
        $listMapper->add('subdimension');
    }
}
