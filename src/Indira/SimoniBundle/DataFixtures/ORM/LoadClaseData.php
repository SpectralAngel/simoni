<?php


namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\Clase;

class LoadClaseData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $flora = $this->getReference('Flora');
        $fauna = $this->getReference('Fauna');
        
        $tipos = array(
            1 => 'Mamifero',
            2 => 'Ave',
            3 => 'Reptil',
            4 => 'Anfibio',
            5 => 'Pez',
            6 => 'Otros'
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Clase();
            $entity->setReino($fauna);
            $entity->setNombre($nombre);
            $manager->persist($entity);
        }
        
        $tipos = array(
            1 => 'Arbol',
            2 => 'Arbusto',
            3 => 'Epifito',
            4 => 'Hierba',
            5 => 'Musgo',
            6 => 'Helecho',
            7 => 'Otros'
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Clase();
            $entity->setReino($flora);
            $entity->setNombre($nombre);
            $manager->persist($entity);
        }
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}

