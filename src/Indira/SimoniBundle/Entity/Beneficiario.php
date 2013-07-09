<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Beneficiario
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
     * @ORM\OneToMany(targetEntity="AtributoClave", mappedBy="beneficiario")
     */
    protected $atributosclave;
    
    /**
     * @ORM\ManyToOne(targetEntity="SubDimension", inversedBy="beneficiarios")
     */
    protected $subdimension;
    
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
        $this->atributosclave = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add atributosclave
     *
     * @param \Indira\SimoniBundle\Entity\AtributoClave $atributosclave
     * @return Beneficiario
     */
    public function addAtributosclave(\Indira\SimoniBundle\Entity\AtributoClave $atributosclave)
    {
        $this->atributosclave[] = $atributosclave;

        return $this;
    }

    /**
     * Remove atributosclave
     *
     * @param \Indira\SimoniBundle\Entity\AtributoClave $atributosclave
     */
    public function removeAtributosclave(\Indira\SimoniBundle\Entity\AtributoClave $atributosclave)
    {
        $this->atributosclave->removeElement($atributosclave);
    }

    /**
     * Get atributosclave
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtributosclave()
    {
        return $this->atributosclave;
    }

    /**
     * Set subdimension
     *
     * @param \Indira\SimoniBundle\Entity\SubDimension $subdimension
     * @return Beneficiario
     */
    public function setSubdimension(\Indira\SimoniBundle\Entity\SubDimension $subdimension = null)
    {
        $this->subdimension = $subdimension;

        return $this;
    }

    /**
     * Get subdimension
     *
     * @return \Indira\SimoniBundle\Entity\SubDimension 
     */
    public function getSubdimension()
    {
        return $this->subdimension;
    }
}
