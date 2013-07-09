<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dimension
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dimension
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
     * @ORM\Column(name="imagen", type="string", length=255)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;
    
    /**
     * @ORM\OneToMany(targetEntity="SubDimension", mappedBy="dimension")
     */
    protected $subdimensiones;
    
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
     * @return Dimension
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
     * Set imagen
     *
     * @param string $imagen
     * @return Dimension
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Dimension
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
     * Constructor
     */
    public function __construct()
    {
        $this->subdimensiones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subdimensiones
     *
     * @param \Indira\SimoniBundle\Entity\SubDimension $subdimensiones
     * @return Dimension
     */
    public function addSubdimensione(\Indira\SimoniBundle\Entity\SubDimension $subdimensiones)
    {
        $this->subdimensiones[] = $subdimensiones;

        return $this;
    }

    /**
     * Remove subdimensiones
     *
     * @param \Indira\SimoniBundle\Entity\SubDimension $subdimensiones
     */
    public function removeSubdimensione(\Indira\SimoniBundle\Entity\SubDimension $subdimensiones)
    {
        $this->subdimensiones->removeElement($subdimensiones);
    }

    /**
     * Get subdimensiones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubdimensiones()
    {
        return $this->subdimensiones;
    }
}
