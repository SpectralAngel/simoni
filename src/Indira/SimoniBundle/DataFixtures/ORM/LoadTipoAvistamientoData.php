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
        $tipos = array(
            'Detección',
            'Animal atropellado',
            'Animal capturado',
            'Animal cazado',
            'Avistamiento',
            'Feca',
            'Huella',
            'Marca',
            'Registro auditivo',
            'Registro por cámara - trampa',
            'Reporte de tercero',
            'Restos de animal',
            'Foto Captura',
            'Detección'
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));

        foreach ($tipos as $i => $nombre) {
            $entity = new TipoAvistamiento();
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
