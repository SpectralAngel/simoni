<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zona
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Zona
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
     * @ORM\OneToMany(targetEntity="Avistamiento", mappedBy="zona")
     */
    protected $avistamientos;
    
    /**
     * @ORM\OneToMany(targetEntity="AvistamientoImportado", mappedBy="zona")
     */
    protected $avistamientosImportados;
    
    /**
     * @ORM\OneToMany(targetEntity="Denuncia", mappedBy="zona")
     */
    protected $denuncias;
    
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
     * @return Zona
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
        $this->avistamientos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->avistamientosImportados = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     * @return Zona
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
     * Set color
     *
     * @param string $color
     * @return Zona
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
     * Add avistamientosImportados
     *
     * @param \Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientosImportados
     * @return Zona
     */
    public function addAvistamientosImportado(\Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientosImportados)
    {
        $this->avistamientosImportados[] = $avistamientosImportados;

        return $this;
    }

    /**
     * Remove avistamientosImportados
     *
     * @param \Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientosImportados
     */
    public function removeAvistamientosImportado(\Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientosImportados)
    {
        $this->avistamientosImportados->removeElement($avistamientosImportados);
    }

    /**
     * Get avistamientosImportados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvistamientosImportados()
    {
        return $this->avistamientosImportados;
    }

    /**
     * Add denuncias
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncias
     * @return Zona
     */
    public function addDenuncia(\Indira\SimoniBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias[] = $denuncias;

        return $this;
    }

    /**
     * Remove denuncias
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncias
     */
    public function removeDenuncia(\Indira\SimoniBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias->removeElement($denuncias);
    }

    /**
     * Get denuncias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDenuncias()
    {
        return $this->denuncias;
    }
}
