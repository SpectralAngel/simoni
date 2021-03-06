<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sexo
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
     * @ORM\OneToMany(targetEntity="Avistamiento", mappedBy="sexo")
     */
    protected $avistamientos;
    
    /**
     * @ORM\OneToMany(targetEntity="Ejemplar", mappedBy="sexo")
     */
    protected $ejemplares;
    
    
    public function __toString()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->avistamientos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ejemplares = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Sexo
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
     * Set color
     *
     * @param string $color
     * @return Sexo
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

    /**
     * Add avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     * @return Sexo
     */
    public function addAvistamiento(\Indira\SimoniBundle\Entity\Avistamiento $avistamientos)
    {
        $this->avistamientos[] = $avistamientos;

        return $this;
    }

    /**
     * Remove avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     */
    public function removeAvistamiento(\Indira\SimoniBundle\Entity\Avistamiento $avistamientos)
    {
        $this->avistamientos->removeElement($avistamientos);
    }

    /**
     * Get avistamientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvistamientos()
    {
        return $this->avistamientos;
    }

    /**
     * Add ejemplares
     *
     * @param \Indira\SimoniBundle\Entity\Ejemplar $ejemplares
     * @return Sexo
     */
    public function addEjemplare(\Indira\SimoniBundle\Entity\Ejemplar $ejemplares)
    {
        $this->ejemplares[] = $ejemplares;

        return $this;
    }

    /**
     * Remove ejemplares
     *
     * @param \Indira\SimoniBundle\Entity\Ejemplar $ejemplares
     */
    public function removeEjemplare(\Indira\SimoniBundle\Entity\Ejemplar $ejemplares)
    {
        $this->ejemplares->removeElement($ejemplares);
    }

    /**
     * Get ejemplares
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEjemplares()
    {
        return $this->ejemplares;
    }
}
