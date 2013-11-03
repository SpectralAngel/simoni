<?php


namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\Edad;

class LoadEdadData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $flora = $this->getReference('Flora');
        $fauna = $this->getReference('Fauna');
        
        $tipos = array(
            'Cría',
            'Juvenil',
            'Adulto',
            'Indeterminado',
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Edad();
            $entity->setNombre($nombre);
            $entity->setReino($fauna);
            $entity->setColor($colores[$i]);
            $manager->persist($entity);
        }
        
        $tipos = array(
            'Plántula',
            'Planta Jóven',
            'Planta Adulta',
            'Indeterminado',
        );
        
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Edad();
            $entity->setNombre($nombre);
            $entity->setReino($flora);
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
        return 3; // the order in which fixtures will be loaded
    }
}
