<?php

namespace Indira\SimoniBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class EjemplarType extends AbstractType
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
            ->add('sexo', null, array(
                'empty_data'  => null,
                'empty_value' => "",
                'required' => TRUE
            ))
            ->add('edad', null, array(
                'empty_data'  => null,
                'empty_value' => "",
                'required' => TRUE,
                'query_builder' => function(EntityRepository $er) use ($reino)
                {
                    return $er->createQueryBuilder('e')
                        ->where('e.reino = :reino')
                        ->setParameter('reino', $reino)
                    ;
                }
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Indira\SimoniBundle\Entity\Ejemplar'
        ));
    }

    public function getName()
    {
        return 'indira_simonibundle_ejemplartype';
    }
}
