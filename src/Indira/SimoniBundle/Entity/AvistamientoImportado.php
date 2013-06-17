<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avistamiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AvistamientoImportado
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
     * @ORM\Column(name="nombre_cientifico", type="string", length=255, nullable=true)
     */
    private $nombreCientifico;
    
    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255, nullable=true)
     */
    protected $genero;
    
    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=255, nullable=true)
     */
    protected $localidad;
    
    /**
     * @var string
     *
     * @ORM\Column(name="especie", type="string", length=255, nullable=true)
     */
    protected $especie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clase", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="clase_id", referencedColumnName="id")
     */
    protected $clase;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoAvistamiento", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="tipo_avistamiento_id", referencedColumnName="id")
     */
    protected $tipo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Municipio", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     */
    protected $municipio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Zona", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     */
    protected $zona;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Edad", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="edad_id", referencedColumnName="id")
     */
    protected $edad;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reino", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="reino_id", referencedColumnName="id")
     */
    protected $reino;
    
    /**
     * @ORM\ManyToOne(targetEntity="Sexo", inversedBy="avistamientosImportados")
     * @ORM\JoinColumn(name="sexo_id", referencedColumnName="id")
     */
    protected $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="decimal", nullable=true, precision=18, scale=9)
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="decimal", nullable=true, precision=18, scale=9)
     */
    private $longitud;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", nullable=true)
     */
    private $comentario;

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
     * Set especie
     *
     * @param string $especie
     * @return AvistamientoImportado
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
     * Set tipo
     *
     * @param string $tipo
     * @return AvistamientoImportado
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return AvistamientoImportado
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return AvistamientoImportado
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     * @return AvistamientoImportado
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     * @return AvistamientoImportado
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return AvistamientoImportado
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
     * Set municipio
     *
     * @param \Indira\SimoniBundle\Entity\Municipio $municipio
     * @return AvistamientoImportado
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
     * @return AvistamientoImportado
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
     * Set usuario
     *
     * @param \Indira\SimoniBundle\Entity\User $usuario
     * @return AvistamientoImportado
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
     * Set edad
     *
     * @param \Indira\SimoniBundle\Entity\Edad $edad
     * @return AvistamientoImportado
     */
    public function setEdad(\Indira\SimoniBundle\Entity\Edad $edad = null)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return \Indira\SimoniBundle\Entity\Edad 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set nombreComun
     *
     * @param string $nombreComun
     * @return AvistamientoImportado
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
     * Set genero
     *
     * @param string $genero
     * @return AvistamientoImportado
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
     * Set sexo
     *
     * @param \Indira\SimoniBundle\Entity\Sexo $sexo
     * @return AvistamientoImportado
     */
    public function setSexo(\Indira\SimoniBundle\Entity\Sexo $sexo = null)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return \Indira\SimoniBundle\Entity\Sexo 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return AvistamientoImportado
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
     * Set nombreCientifico
     *
     * @param string $nombreCientifico
     * @return AvistamientoImportado
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
     * Set clase
     *
     * @param \Indira\SimoniBundle\Entity\Clase $clase
     * @return AvistamientoImportado
     */
    public function setClase(\Indira\SimoniBundle\Entity\Clase $clase = null)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return \Indira\SimoniBundle\Entity\Clase 
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set reino
     *
     * @param \Indira\SimoniBundle\Entity\Reino $reino
     * @return AvistamientoImportado
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
