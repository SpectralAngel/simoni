<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use Indira\SimoniBundle\Entity\Departamento;

class LoadDepartamentoData implements FixtureInterface, ContainerAwareInterface {
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this -> container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $niveles = array(
            'Atlántida',
            'Choluteca',
            'Colón',
            'Comayagua',
            'Copán',
            'Cortés',
            'El Paraíso',
            'Francisco Morazán',
            'Gracias a Dios',
            'Intibucá',
            'Islas de la Bahía',
            'La Paz',
            'Lempira',
            'Olancho',
            'Ocotepeque',
            'Santa Bárbara',
            'Valle',
            'Yoro'
        );
        
        sort($niveles);
        $colores = ColorGenerator::generateUniqueHexColors(count($niveles));
        
        foreach ($niveles as $i => $nombre) {
            $entity = new Departamento();
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $manager->flush();
        
    }
}
