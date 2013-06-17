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
            ->add('fechaDeNacimiento')
            ->add('telefono')
            ->add('direccion')
            ->add('departamento')
            ->add('pais')
            ->add('nivelEducativo')
        ;
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
}