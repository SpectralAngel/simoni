<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clase
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Clase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reino", inversedBy="clases")
     * @ORM\JoinColumn(name="reino_id", referencedColumnName="id")
     */
    protected $reino;
    
    public function __toString()
    {
        return $this->nombre;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Clase
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set reino
     *
     * @param \Indira\SimoniBundle\Entity\Reino $reino
     * @return Clase
     */
    public function setReino(\Indira\SimoniBundle\Entity\Reino $reino = null)
    {
        $this->reino = $reino;

        return $this;
    }

    /**
     * Get reino
     *
     * @return \Indira\SimoniBundle\Entity\Reino 
     */
    public function getReino()
    {
        return $this->reino;
    }
}
