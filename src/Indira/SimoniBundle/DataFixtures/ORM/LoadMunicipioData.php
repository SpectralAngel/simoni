<?php


namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\Municipio;

class LoadMunicipioData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tipos = array(
            'Brus Laguna',
            'Dulce Nombre de Culmí',
            'Iriona',
            'Juan Francisco Bulnes',
            'Wampusirpe'
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos));
        
        foreach ($tipos as $i => $nombre) {
            $entity = new Municipio();
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
        return 10; // the order in which fixtures will be loaded
    }
}
