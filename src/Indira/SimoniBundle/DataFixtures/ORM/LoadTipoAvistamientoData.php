<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\TipoAvistamiento;

class LoadTipoAvistamientoData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $flora = $this->getReference('Flora');
        $fauna = $this->getReference('Fauna');
        
        $tipos = array(
            'Huella',
            'Marca',
            'Heces',
            'Foto Captura',
            'Reporte de tercero',
            'Restos de animal',
            'Otros',
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));

        foreach ($tipos as $i => $nombre) {
            $entity = new TipoAvistamiento();
            $entity->setReino($fauna);
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $tipos = array(
            'Detección',
            'Flor',
            'Fruta',
            'Otros',
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));

        foreach ($tipos as $i => $nombre) {
            $entity = new TipoAvistamiento();
            $entity->setReino($flora);
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        $manager -> flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2;
        // the order in which fixtures will be loaded
    }

}
