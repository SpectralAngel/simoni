<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AvistamientoImportadoReinoType extends AbstractType
{
    
    public function __construct($reino)
    {
        $this->reino = $reino;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $reino = $this->reino;
        $builder
            ->add('municipio', null, array(
                'empty_data'  => null,
                'empty_value' => "",
                'required' => TRUE
            ))
            ->add('zona', null, array(
                'empty_data'  => null,
                'empty_value' => "",
                'required' => TRUE
            ))
            ->add('localidad', null, array(
                'required' => TRUE
            ))
            ->add('latitud', null, array(
                'label' => 'X (UTM)',
                'required' => TRUE
            ))
            ->add('longitud', null, array(
                'label' => 'Y (UTM)',
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
                'empty_data'  => null,
                'empty_value' => "",
                'required' => TRUE,
                'query_builder' => function(EntityRepository $er) use ($reino)
                {
                    return $er->createQueryBuilder('c')
                        ->where('c.reino = :reino')
                        ->setParameter('reino', $reino)
                    ;
                }
            ))
            ->add('fecha', null, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy hh:mm',
                'required' => TRUE,
                'attr' => array('class' => 'datetimepicker')
            ))
            ->add('tipo', null, array(
                'empty_data'  => null,
                'empty_value' => "",
                'label' => 'Tipo de Detección',
                'required' => TRUE,
                'query_builder' => function(EntityRepository $er) use ($reino)
                {
                    return $er->createQueryBuilder('d')
                        ->where('d.reino = :reino')
                        ->setParameter('reino', $reino)
                    ;
                }
            ))
            ->add('cantidad', null, array(
                'label' => 'Cantidad de Ejemplares',
                'required' => TRUE
            ))
            ->add('ejemplares', 'collection', array(
                'type' => new EjemplarType($reino),
                'allow_add'    => true,
                'prototype_name' => 'Ejemplar__'
            ))
            ->add('imagenes', 'collection', array(
                'type' => new ImagenType(),
                'allow_add'    => true,
                'prototype_name' => 'Imagen__'
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
