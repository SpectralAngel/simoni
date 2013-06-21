<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use Indira\SimoniBundle\Entity\Pais;

class LoadPaisData implements FixtureInterface, ContainerAwareInterface {
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this -> container = $container;
    }

    public function load(ObjectManager $manager) {
        
        $paises = array(
            'Afganistán' , 'Albania' , 'Alemania' , 'Andorra' , 'Angola' ,
            'Antigua y Barbuda' , 'Antillas Holandesas' , 'Arabia Saudí' ,
            'Argelia' , 'Argentina' , 'Armenia' , 'Aruba' , 'Australia' ,
            'Austria' , 'Azerbaiyán' , 'Bahamas' , 'Bahrein' , 'Bangladesh' ,
            'Barbados' , 'Bélgica' , 'Belice' , 'Benín' , 'Bermudas' ,
            'Bielorrusia' , 'Bolivia' , 'Botswana' , 'Bosnia' , 'Brasil' ,
            'Brunei' , 'Bulgaria' , 'BurkinaFaso' , 'Burundi' , 'Bután' ,
            'Cabo Verde' , 'Camboya' , 'Camerún' , 'Canadá' , 'Chad' , 'Chile' ,
            'China' , 'Chipre' , 'Colombia' , 'Comoras' , 'Congo' ,
            'Corea del Norte' , 'Corea del Sur' , 'Costa de Marfil' ,
            'Costa Rica' , 'Croacia' , 'Cuba' , 'Dinamarca' , 'Dominica' ,
            'Dubai' , 'Ecuador' , 'Egipto' , 'El Salvador' ,
            'Emiratos Árabes Unidos' , 'Eritrea' , 'Eslovaquia' ,
            'Eslovenia' , 'España' , 'Estados Unidos de América' , 'Estonia' ,
            'Etiopía' , 'Fiyi' , 'Filipinas' , 'Finlandia' , 'Francia' ,
            'Gabón' , 'Gambia' , 'Georgia' , 'Ghana' , 'Grecia' , 'Guam' ,
            'Guatemala' , 'Guayana Francesa' , 'Guinea-Bissau' ,
            'Guinea Ecuatorial' , 'Guinea' , 'Guyana' , 'Granada' , 'Haití' ,
            'Honduras' , 'HongKong' , 'Hungría' , 'Holanda' , 'India' ,
            'Indonesia' , 'Irak' , 'Irán' , 'Irlanda' , 'Islandia' ,
            'Islas Caimán' , 'Islas Marshall' , 'Islas Pitcairn' ,
            'Islas Salomón' , 'Israel' , 'Italia' , 'Jamaica' , 'Japón' ,
            'Jordania' , 'Kazajstán' , 'Kenia' , 'Kirguistán' , 'Kiribati' ,
            'Kósovo' , 'Kuwait' , 'Laos' , 'Lesotho' , 'Letonia' , 'Líbano' ,
            'Liberia' , 'Libia' , 'Liechtenstein' , 'Lituania' , 'Luxemburgo' ,
            'Macedonia' , 'Madagascar' , 'Malasia' , 'Malawi' , 'Maldivas' ,
            'Malí' , 'Malta' , 'Marianas del Norte' , 'Marruecos' , 'Mauricio' ,
            'Mauritania' , 'México' , 'Micronesia' , 'Mónaco' , 'Moldavia' ,
            'Mongolia' , 'Montenegro' , 'Mozambique' , 'Myanmar' , 'Namibia' ,
            'Nauru' , 'Nepal' , 'Nicaragua' , 'Níger' , 'Nigeria' , 'Noruega' ,
            'NuevaZelanda' , 'Omán' , 'OrdendeMalta' , 'Países Bajos' ,
            'Pakistán' , 'Palestina' , 'Palau' , 'Panamá' ,
            'Papúa Nueva Guinea' , 'Paraguay' , 'Perú' , 'Polonia' ,
            'Portugal' , 'Puerto Rico' , 'Qatar' , 'Reino Unido' ,
            'República Centro africana' , 'República Checa' ,
            'República del Congo' , 'República Democrática del Congo' ,
            'República Dominicana' , 'Ruanda' , 'Rumania' , 'Rusia' ,
            'Sáhara Occidental' , 'SaintKitts-Nevis' , 'Samoa Americana' ,
            'Samoa' , 'San Marino' , 'Santa Lucía' , 'Santo Tomé y Príncipe' ,
            'San Vicente y las Granadinas' , 'Senegal' , 'Serbia' ,
            'Seychelles' , 'SierraLeona' , 'Singapur' , 'Siria' , 'Somalia' ,
            'SriLanka' , 'Sudáfrica' , 'Sudán' , 'Suecia' , 'Suiza' ,
            'Suazilandia' , 'Tailandia' , 'Taiwán' , 'Tanzania' , 'Tayikistán' ,
            'Tíbet' , 'TimorOriental' , 'Togo' , 'Tonga' , 'Trinidad y Tobago' ,
            'Túnez' , 'Turkmenistán' , 'Turquía' , 'Tuvalu' , 'Ucrania' ,
            'Uganda' , 'Uruguay' , 'Uzbequistán' , 'Vanuatu' , 'Vaticano' ,
            'Venezuela' , 'Vietnam' , 'WallisyFutuna' , 'Yemen' , 'Yibuti' , 
            'Zambia' , 'Zaire' , 'Zimbabue'
        );
        sort($paises);
        $colores = ColorGenerator::generateUniqueHexColors(count($paises));
        
        foreach ($paises as $i => $nombre) {
            $entity = new Pais();
            $entity->setNombre($nombre);
            $entity->setBandera($colores[$i]);
            $manager->persist($entity);
        }
        
        $manager->flush();
        
    }
}
