<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Denuncia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Denuncia
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
     * @ORM\ManyToOne(targetEntity="Municipio", inversedBy="denuncias")
     * @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     */
    protected $municipio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Zona", inversedBy="denuncias")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     */
    protected $zona;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoDenuncia", inversedBy="denuncias")
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=255)
     */
    private $localidad;
    /**
     * @var float
     *
     * @ORM\Column(name="area", type="decimal")
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $comentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;
    
    /**
     * @ORM\OneToMany(targetEntity="ImagenDenuncia", mappedBy="denuncia", cascade={"persist"})
     */
    protected $imagenes;
    
    /**
     * @ORM\OneToMany(targetEntity="Coordenada", mappedBy="denuncia", cascade={"persist"})
     */
    protected $coordenadas;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="denuncias")
     */
    protected $usuario;
    
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
     * Set localidad
     *
     * @param string $localidad
     * @return Denuncia
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Denuncia
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Denuncia
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set area
     *
     * @param float $area
     * @return Denuncia
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return float 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Denuncia
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Denuncia
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set municipio
     *
     * @param \Indira\SimoniBundle\Entity\Municipio $municipio
     * @return Denuncia
     */
    public function setMunicipio(\Indira\SimoniBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \Indira\SimoniBundle\Entity\Municipio 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set zona
     *
     * @param \Indira\SimoniBundle\Entity\Zona $zona
     * @return Denuncia
     */
    public function setZona(\Indira\SimoniBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return \Indira\SimoniBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set tipo
     *
     * @param \Indira\SimoniBundle\Entity\TipoDenuncia $tipo
     * @return Denuncia
     */
    public function setTipo(\Indira\SimoniBundle\Entity\TipoDenuncia $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Indira\SimoniBundle\Entity\TipoDenuncia 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add imagenes
     *
     * @param \Indira\SimoniBundle\Entity\ImagenDenuncia $imagenes
     * @return Denuncia
     */
    public function addImagene(\Indira\SimoniBundle\Entity\ImagenDenuncia $imagenes)
    {
        $this->imagenes[] = $imagenes;
        $imagenes->setDenuncia($this);
        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \Indira\SimoniBundle\Entity\ImagenDenuncia $imagenes
     */
    public function removeImagene(\Indira\SimoniBundle\Entity\ImagenDenuncia $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Set usuario
     *
     * @param \Indira\SimoniBundle\Entity\User $usuario
     * @return Denuncia
     */
    public function setUsuario(\Indira\SimoniBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Indira\SimoniBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add coordenadas
     *
     * @param \Indira\SimoniBundle\Entity\Coordenada $coordenadas
     * @return Denuncia
     */
    public function addCoordenada(\Indira\SimoniBundle\Entity\Coordenada $coordenadas)
    {
        $this->coordenadas[] = $coordenadas;
        $coordenadas->setDenuncia($this);
        return $this;
    }

    /**
     * Remove coordenadas
     *
     * @param \Indira\SimoniBundle\Entity\Coordenada $coordenadas
     */
    public function removeCoordenada(\Indira\SimoniBundle\Entity\Coordenada $coordenadas)
    {
        $this->coordenadas->removeElement($coordenadas);
    }

    /**
     * Get coordenadas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoordenadas()
    {
        return $this->coordenadas;
    }
}
