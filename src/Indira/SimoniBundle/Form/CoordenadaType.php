<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoordenadaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('latitud', null, array(
                'label' => 'Latitud (UTM)',
                'required' => TRUE
            ))
            ->add('longitud', null, array(
                'label' => 'Longitud (UTM)',
                'required' => TRUE
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\Coordenada'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_coordenadatype';
    }
}
