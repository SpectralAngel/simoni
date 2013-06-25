<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AvistamientoImportadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('municipio', null, array(
                'required' => TRUE
            ))
            ->add('zona', null, array(
                'required' => TRUE
            ))
            ->add('localidad', null, array(
                'required' => TRUE
            ))
            ->add('latitud', null, array(
                'required' => TRUE
            ))
            ->add('longitud', null, array(
                'required' => TRUE
            ))
            ->add('nombreComun', null, array(
                'label' => 'Nombre Común',
                'required' => TRUE
            ))
            ->add('nombreCientifico', null, array(
                'label' => 'Nombre Científico'
            ))
            ->add('clase', null, array(
                'required' => TRUE
            ))
            ->add('fecha', null, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy hh:mm',
                'required' => TRUE,
                'attr' => array('class' => 'datetimepicker')
            ))
            ->add('tipo', null, array(
                'label' => 'Tipo de Detección',
                'required' => TRUE
            ))
            ->add('cantidad', null, array(
                'label' => 'Cantidad de Ejemplares',
                'required' => TRUE
            ))
            ->add('edad', null, array(
                'required' => TRUE
            ))
            ->add('sexo', null, array(
                'required' => TRUE
            ))
            ->add('comentario', null, array(
                'label' => 'Comentario',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\AvistamientoImportado'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_avistamientoimportadotype';
    }
}
