<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use Indira\SimoniBundle\Entity\NivelEducativo;

class LoadNivelEducativoData implements FixtureInterface, ContainerAwareInterface {
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this -> container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $niveles = array(
            1 =>'Primaria',
            2 =>'Secundaria',
            3 => 'Estudiante Universitario',
            4 => 'Técnico',
            5 =>'Profesional',
            6 =>'Postgrado'
        );
        
        $colores = ColorGenerator::generateUniqueHexColors(count($niveles));
        
        foreach ($niveles as $i => $nombre) {
            $entity = new NivelEducativo();
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $manager->flush();
        
    }
}
