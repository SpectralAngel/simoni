<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoAvistamiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoAvistamiento
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
     * @ORM\OneToMany(targetEntity="Avistamiento", mappedBy="especie")
     */
    protected $avistamientos;
    
    /**
     * @ORM\OneToMany(targetEntity="AvistamientoImportado", mappedBy="edad")
     */
    protected $avistamientosImportados;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reino", inversedBy="tiposAvistamiento")
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
     * @return TipoAvistamiento
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
     * Set color
     *
     * @param string $color
     * @return TipoAvistamiento
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
     * @return TipoAvistamiento
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
     * Add avistamientosImportados
     *
     * @param \Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientosImportados
     * @return TipoAvistamiento
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
     * Set reino
     *
     * @param \Indira\SimoniBundle\Entity\Reino $reino
     * @return TipoAvistamiento
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
