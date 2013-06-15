<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reino
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reino
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
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;
    /**
     * @ORM\OneToMany(targetEntity="Especie", mappedBy="reino")
     */
    protected $especies;

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
     * @return Reino
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
     * Constructor
     */
    public function __construct()
    {
        $this->especies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add especies
     *
     * @param \Indira\SimoniBundle\Entity\Especie $especies
     * @return Reino
     */
    public function addEspecy(\Indira\SimoniBundle\Entity\Especie $especies)
    {
        $this->especies[] = $especies;

        return $this;
    }

    /**
     * Remove especies
     *
     * @param \Indira\SimoniBundle\Entity\Especie $especies
     */
    public function removeEspecy(\Indira\SimoniBundle\Entity\Especie $especies)
    {
        $this->especies->removeElement($especies);
    }

    /**
     * Get especies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspecies()
    {
        return $this->especies;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Reino
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
}
