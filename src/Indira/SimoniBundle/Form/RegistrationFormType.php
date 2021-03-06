<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('identidad')
            ->add('fechaDeNacimiento', 'date', array(
                    'label' => 'Fecha de Nacimiento',
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array('class' => 'datepicker')))
            ->add('telefono')
            ->add('direccion')
            ->add('departamento')
            ->add('pais')
            ->add('nivelEducativo', null, array(
                'label' => 'Nivel Educativo'
            ))
        ;
    }

    public function getName()
    {
        return 'simoni_user_registration';
    }
}