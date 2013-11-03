<?php

namespace Indira\SimoniBundle\DataFixtures\ORM;

class ColorGenerator {
    
    public static function generateUniqueHexColors($quantity = 10)
    {    
        $source = array(
            '#5D8AA8',
            '#E32636',
            '#E52B50',
            '#FFBF00',
            '#A4C639',
            '#8DB600',
            '#FBCEB1',
            '#7FFFD4',
            '#4B5320',
            '#3B444B',
            '#E9D66B',
            '#B2BEB5',
            '#87A96B',
            '#FF9966',
            '#6D351A',
            '#007FFF',
            '#89CFF0',
            '#A1CAF1',
            '#F4C2C2',
            '#FFD12A',
            '#848482',
            '#98777B',
            '#3D2B1F',
            '#000000',
            '#318CE7',
            '#FAF0BE',
            '#0000FF',
            '#DE5D83',
            '#79443B',
            '#CC0000',
            '#B5A642',
            '#66FF00',
            '#BF94E4',
            '#C32148',
            '#FF007F',
            '#08E8DE',
            '#D19FE8',
            '#004225',
            '#CD7F32',
            '#964B00',
            '#FFC1CC',
            '#E7FEFF',
            '#F0DC82',
            '#800020',
            '#DEB887',
            '#CC5500',
            '#E97451',
            '#8A3324',
            '#BD33A4',
            '#702963',
            '#536878',
            '#006B3C',
            '#ED872D',
            '#E30022',
            '#A3C1AD',
            '#78866B',
            '#FFEF00',
            '#FF0800',
            '#C41E3A',
            '#00CC99',
            '#960018',
            '#99BADD',
            '#ED9121',
            '#92A1CF',
            '#ACE1AF',
            '#007BA7',
            '#2A52BE',
            '#A0785A',
            '#36454F',
            '#DFFF00',
            '#DE3163',
            '#FFB7C5',
            '#CD5C5C',
            '#7B3F00',
            '#FFA700',
            '#98817B',
            '#E34234',
            '#D2691E',
            '#E4D00A',
            '#FBCCE7',
            '#00FF6F',
            '#0047AB',
            '#9BDDFF',
            '#002E63',
            '#8C92AC',
            '#B87333',
            '#FF3800',
            '#FF7F50',
            '#893F45',
            '#FBEC5D',
            '#B31B1B',
            '#6495ED',
            '#DC143C',
            '#00FFFF',
            '#FFFF31',
            '#F0E130',
            '#00008B',
            '#654321',
            '#5D3954',
            '#A40000',
            '#08457E',
            '#986960',
            '#CD5B45',
            '#008B8B',
            '#B8860B',
            '#013220',
            '#1A2421',
            '#BDB76B',
            '#483C32',
            '#734F96',
            '#8B008B',
            '#003366',
            '#556B2F',
            '#FF8C00',
            '#779ECB',
            '#03C03C',
            '#966FD6',
            '#C23B22',
            '#E75480',
            '#003399',
            '#872657',
            '#E9967A',
            '#560319',
            '#3C1414',
            '#2F4F4F',
            '#177245',
            '#918151',
            '#FFA812',
            '#CC4E5C',
            '#9400D3',
            '#555555',
            '#1560BD',
            '#C19A6B',
            '#EDC9AF',
            '#696969',
            '#85BB65',
            '#00009C',
            '#E1A95F',
            '#614051',
            '#50C878',
            '#E5AA70',
            '#FF1C00',
            '#CE1620',
            '#B22222',
            '#E25822',
            '#FC8EAC',
            '#F7E98E',
            '#014421',
            '#E49B0F',
            '#6082B6',
            '#996515',
            '#FFDF00',
            '#DAA520',
            '#808080',
            '#008000',
            '#71A6D2',
            '#FCF75E',
            '#B2EC5D',
            '#138808',
            '#FF5C5C',
            '#E3A857',
            '#002FA7',
            '#00A86B',
            '#D73B3E',
            '#C3B091',
            '#B57EDC',
            '#CCCCFF',
            '#C4C3D0',
            '#7CFC00',
            '#FFF700',
            '#BFFF00',
            '#FF00FF',
            '#C04000',
            '#800000',
            '#191970',
            '#3EB489',
            '#FFDB58',
            '#000080',
            '#CC7722',
            '#808000',
            '#FF7F00',
            '#002147',
            '#AEC6CF',
            '#836953',
            '#CFCFC4',
            '#77DD77',
            '#F49AC2',
            '#FFB347',
            '#FFD1DC',
            '#B39EB5',
            '#FF6961',
            '#CB99C9',
            '#FDFD96',
            '#FFE5B4',
            '#D1E231',
            '#F0EAD6',
            '#E6E200',
            '#01796F',
            '#FFC0CB',
            '#93C572',
            '#E5E4E2',
            '#8E4585',
            '#FF5A36',
            '#701C1C',
            '#FF7518',
            '#69359C',
            '#E30B5D',
            '#826644',
            '#FF0000',
            '#414833',
            '#65000B',
            '#002366',
            '#E0115F',
            '#B7410E',
            '#FF6700',
            '#F4C430',
            '#FF8C69',
            '#C2B280',
            '#967117',
            '#ECD540',
            '#082567',
            '#321414',
            '#704214',
            '#8A795D',
            '#C0C0C0',
            '#CB410B',
            '#87CEEB',
            '#CF71AF',
            '#A7FC00',
            '#4682B4',
            '#E4D96F',
            '#FAD6A5',
            '#F28500',
            '#008080',
            '#E2725B',
            '#EEE600',
            '#00755E',
            '#30D5C8',
            '#120A8F',
            '#5B92E5',
            '#F3E5AB',
            '#8F00FF',
            '#F5DEB3',
            '#738678',
            '#0F4D92',
            '#FFFF00',
            '#FAD6A5',
            '#F28500',
            '#008080',
            '#E2725B',
            '#EEE600',
            '#00755E',
            '#30D5C8',
            '#120A8F',
            '#5B92E5',
            '#F3E5AB',
            '#8F00FF',
            '#F5DEB3',
            '#738678',
            '#0F4D92',
            '#FFFF00',
        );
        $quantity = (intval($quantity) == 0) ? 1 : intval($quantity);
        
        $colors = array();
        $escogidos = array();
        $source_amount = count($source);
        for ($i = 0; $i < $quantity; $i++) {
            $choice = mt_rand(0, $source_amount);
            while (in_array($choice, $escogidos) or $choice >= $source_amount) {
                $choice = mt_rand(0, $source_amount);
            }
            $colors[] = $source[$choice];
            $escogidos[] =  $choice;
        }
        return $colors;
    }
}