<?php


namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\Zona;

class LoadZonaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tipos = array(
            0 => 'Amortiguamiento',
            1 => 'Cultural',
            2 => 'Núcleo',
            3 => 'Otra'
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Zona();
            $entity->setNombre($nombre);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}

