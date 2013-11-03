<?php


namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Indira\SimoniBundle\Entity\Dimension;
use Indira\SimoniBundle\Entity\SubDimension;
use Indira\SimoniBundle\Entity\Beneficiario;

class LoadDimensionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tipos = array(
            1 => array('nombre' => 'Físico-Química',
                        'imagen' => 'fisico',
                       'subdimensiones' => array(
                            1 => array('nombre' => 'Cuencas',
                                'beneficiarios' => array(
                            )))),
            2 => array('nombre' => 'Biológica-Ecológica',
                       'imagen' => 'biologica',
                        'subdimensiones' => array(
                            1 => array('nombre' => 'Fauna',
                                'beneficiarios' => array(
                                    'Iguana',
                                    'Jaguar y sus Presas',
                                    'Tortugas Marinas'
                                )
                            ),
                            2 => array('nombre' => 'Flora',
                                        'beneficiarios' => array()
                            ),
                            3 => array('nombre' => 'Ecosistema',
                                        'beneficiarios' => array()
                            ),
                        )),
            3 => array('nombre' => 'Socio-Cultural',
                       'imagen' => 'social',
                       'subdimensiones' => array(
                            1 => array('nombre' => 'Población',
                                'beneficiarios' => array(
                            ))
                            )
                       ),
            4 => array('nombre' => 'Económica-Servicios',
                       'imagen' => 'economica',
                       'subdimensiones' => array(
                            1 => array('nombre' => 'Producción Sostenible',
                                'beneficiarios' => array(
                            ))
                            )
                        )
        );
        $colores = ColorGenerator::generateUniqueHexColors(count($tipos) + 1);
        
        foreach ($tipos as $i => $dimension) {
            $entity = new Dimension();
            $entity->setNombre($dimension['nombre']);
            $entity->setImagen($dimension['imagen']);
            $entity->setColor($colores[$i]);
            $sol_color = ColorGenerator::generateUniqueHexColors(count($dimension['subdimensiones']) + 1);
            $manager->persist($entity);
            foreach($dimension['subdimensiones'] as $j => $subdimension)
            {
                $subentity = new SubDimension();
                $subentity->setNombre($subdimension['nombre']);
                $subentity->setImagen($subdimension['nombre']);
                $subentity->setColor($sol_color[$j]);
                $subentity->setDimension($entity);
                $manager->persist($subentity);
                $sub_color = ColorGenerator::generateUniqueHexColors(count($subdimension['beneficiarios']) + 1);
                foreach($subdimension['beneficiarios'] as $k => $beneficiario)
                {
                    $bentity = new Beneficiario();
                    $bentity->setNombre($beneficiario);
                    $bentity->setImagen($beneficiario);
                    $bentity->setColor($sub_color[$k]);
                    $bentity->setSubdimension($subentity);
                    $manager->persist($bentity);
                }
            }
        }
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
