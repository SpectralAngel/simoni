<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImagenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'sonata_media_type', array(
                'label' => 'Imagen',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\Imagen'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_imagentype';
    }
}
