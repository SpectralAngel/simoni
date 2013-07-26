<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubDimension
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SubDimension
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
     * @ORM\OneToMany(targetEntity="Beneficiario", mappedBy="subdimension")
     */
    protected $beneficiarios;
    
    /**
     * @ORM\ManyToOne(targetEntity="Dimension", inversedBy="subdimensiones")
     */
    protected $dimension;
    
    public function __toString()
    {
        return $this->nombre.'';
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
     * @return SubDimension
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
     * @return SubDimension
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
     * @return SubDimension
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
        $this->beneficiarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add beneficiarios
     *
     * @param \Indira\SimoniBundle\Entity\Beneficiario $beneficiarios
     * @return SubDimension
     */
    public function addBeneficiario(\Indira\SimoniBundle\Entity\Beneficiario $beneficiarios)
    {
        $this->beneficiarios[] = $beneficiarios;

        return $this;
    }

    /**
     * Remove beneficiarios
     *
     * @param \Indira\SimoniBundle\Entity\Beneficiario $beneficiarios
     */
    public function removeBeneficiario(\Indira\SimoniBundle\Entity\Beneficiario $beneficiarios)
    {
        $this->beneficiarios->removeElement($beneficiarios);
    }

    /**
     * Get beneficiarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBeneficiarios()
    {
        return $this->beneficiarios;
    }

    /**
     * Set dimension
     *
     * @param \Indira\SimoniBundle\Entity\Dimension $dimension
     * @return SubDimension
     */
    public function setDimension(\Indira\SimoniBundle\Entity\Dimension $dimension = null)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get dimension
     *
     * @return \Indira\SimoniBundle\Entity\Dimension 
     */
    public function getDimension()
    {
        return $this->dimension;
    }
}
