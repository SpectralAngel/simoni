<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Especie
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
     * @ORM\Column(name="nombre_comun", type="string", length=255, nullable=true)
     */
    private $nombreComun;
    
    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255, nullable=true)
     */
    protected $genero;
    
    /**
     * @var string
     *
     * @ORM\Column(name="especie", type="string", length=255, nullable=true)
     */
    protected $especie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_cientifico", type="string", length=255, nullable=true)
     */
    private $nombreCientifico;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reino", inversedBy="especies")
     */
    protected $reino;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_pech", type="string", length=255, nullable=true)
     */
    private $nombrePech;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_tawaka", type="string", length=255, nullable=true)
     */
    private $nombreTawaka;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_garifuna", type="string", length=255, nullable=true)
     */
    private $nombreGarifuna;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_misquito", type="string", length=255, nullable=true)
     */
    private $nombreMisquito;
    
    /**
     * @var string
     *
     * @ORM\Column(name="UICN", type="string", length=255, nullable=true)
     */
    private $uICN;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CITES", type="string", length=255, nullable=true)
     */
    private $cITES;
    
    /**
     * @ORM\OneToMany(targetEntity="Avistamiento", mappedBy="especie")
     */
    protected $avistamientos;
    
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
     * Set nombreComun
     *
     * @param string $nombreComun
     * @return Especie
     */
    public function setNombreComun($nombreComun)
    {
        $this->nombreComun = $nombreComun;

        return $this;
    }

    /**
     * Get nombreComun
     *
     * @return string 
     */
    public function getNombreComun()
    {
        return $this->nombreComun;
    }

    /**
     * Set nombreCientifico
     *
     * @param string $nombreCientifico
     * @return Especie
     */
    public function setNombreCientifico($nombreCientifico)
    {
        $this->nombreCientifico = $nombreCientifico;

        return $this;
    }

    /**
     * Get nombreCientifico
     *
     * @return string 
     */
    public function getNombreCientifico()
    {
        return $this->nombreCientifico;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Especie
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set nombrePech
     *
     * @param string $nombrePech
     * @return Especie
     */
    public function setNombrePech($nombrePech)
    {
        $this->nombrePech = $nombrePech;

        return $this;
    }

    /**
     * Get nombrePech
     *
     * @return string 
     */
    public function getNombrePech()
    {
        return $this->nombrePech;
    }

    /**
     * Set nombreTawaka
     *
     * @param string $nombreTawaka
     * @return Especie
     */
    public function setNombreTawaka($nombreTawaka)
    {
        $this->nombreTawaka = $nombreTawaka;

        return $this;
    }

    /**
     * Get nombreTawaka
     *
     * @return string 
     */
    public function getNombreTawaka()
    {
        return $this->nombreTawaka;
    }

    /**
     * Set nombreGarifuna
     *
     * @param string $nombreGarifuna
     * @return Especie
     */
    public function setNombreGarifuna($nombreGarifuna)
    {
        $this->nombreGarifuna = $nombreGarifuna;

        return $this;
    }

    /**
     * Get nombreGarifuna
     *
     * @return string 
     */
    public function getNombreGarifuna()
    {
        return $this->nombreGarifuna;
    }

    /**
     * Set nombreMisquito
     *
     * @param string $nombreMisquito
     * @return Especie
     */
    public function setNombreMisquito($nombreMisquito)
    {
        $this->nombreMisquito = $nombreMisquito;

        return $this;
    }

    /**
     * Get nombreMisquito
     *
     * @return string 
     */
    public function getNombreMisquito()
    {
        return $this->nombreMisquito;
    }

    /**
     * Set uICN
     *
     * @param string $uICN
     * @return Especie
     */
    public function setUICN($uICN)
    {
        $this->uICN = $uICN;

        return $this;
    }

    /**
     * Get uICN
     *
     * @return string 
     */
    public function getUICN()
    {
        return $this->uICN;
    }

    /**
     * Set cITES
     *
     * @param string $cITES
     * @return Especie
     */
    public function setCITES($cITES)
    {
        $this->cITES = $cITES;

        return $this;
    }

    /**
     * Get cITES
     *
     * @return string 
     */
    public function getCITES()
    {
        return $this->cITES;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->avistamientos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set genero
     *
     * @param string $genero
     * @return Especie
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set especie
     *
     * @param string $especie
     * @return Especie
     */
    public function setEspecie($especie)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return string 
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * Set reino
     *
     * @param \Indira\SimoniBundle\Entity\Reino $reino
     * @return Especie
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

    /**
     * Add avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     * @return Especie
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
}
