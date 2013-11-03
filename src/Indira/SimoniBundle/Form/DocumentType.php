<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array(
                'label' => 'Nombre del Archivo'
            ))
            ->add('file')
            ->add('municipio', 'entity', array(
                'mapped'   => false,
                'class' => 'Indira\SimoniBundle\Entity\Municipio',
                )
            )
            ->add('zona', 'entity', array(
                'mapped'   => false,
                'class' => 'Indira\SimoniBundle\Entity\Zona',
                )
            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\Document'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_documenttype';
    }
}
