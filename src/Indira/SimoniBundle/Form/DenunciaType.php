<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DenunciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('municipio')
            ->add('zona')
            ->add('localidad')
            ->add('latitud')
            ->add('longitud')
            ->add('area')
            ->add('fecha', null, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy hh:mm',
                'required' => TRUE,
                'attr' => array('class' => 'datetimepicker')
            ))
            ->add('tipo')
            ->add('comentario')
            ->add('imagenes', 'collection', array(
                'type' => new ImagenDenunciaType(),
                'by_reference' => false,
                'allow_add'    => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\Denuncia'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_denunciatype';
    }
}
