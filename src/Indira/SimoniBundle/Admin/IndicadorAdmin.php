<?php

namespace Indira\SimoniBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class IndicadorAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('descripcion');
        $formMapper->add('nivel');
        $formMapper->add('atributoclave');
        $formMapper->add('tipo');
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('descripcion');
        $datagridMapper->add('nivel');
        $datagridMapper->add('atributoclave');
        $datagridMapper->add('tipo');
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('descripcion');
        $listMapper->add('nivel');
        $listMapper->add('atributoclave');
        $listMapper->add('tipo');
    }
}
