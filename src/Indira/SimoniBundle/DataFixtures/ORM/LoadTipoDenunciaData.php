<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use Indira\SimoniBundle\Entity\TipoDenuncia;

class LoadTipoDenunciaData implements FixtureInterface, ContainerAwareInterface {
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this -> container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $niveles = array(
            'Descombro',
            'Quema',
            'Socola',
            'Pica',
            'Tráfico Ilegal',
            'Tráfico de Piezas Arqueológicas',
            'Desechos Sólidos',
            'Construcciones'
        );
        
        sort($niveles);
        $colores = ColorGenerator::generateUniqueHexColors(count($niveles));
        
        foreach ($niveles as $i => $nombre) {
            $entity = new TipoDenuncia();
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $manager->flush();
        
    }
}
