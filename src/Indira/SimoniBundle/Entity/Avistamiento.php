<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avistamiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Avistamiento
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
     * @ORM\ManyToOne(targetEntity="Especie", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="especie_id", referencedColumnName="id")
     */
    protected $especie;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoAvistamiento", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="tipo_avistamiento_id", referencedColumnName="id")
     */
    protected $tipo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Municipio", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="municipio_id", referencedColumnName="id")
     */
    protected $municipio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Zona", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     */
    protected $zona;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Edad", inversedBy="avistamientos")
     * @ORM\JoinColumn(name="edad_id", referencedColumnName="id")
     */
    protected $edad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="decimal")
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="decimal")
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text")
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Avistamiento
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
     * @return Avistamiento
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
     * @return Avistamiento
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
     * @return Avistamiento
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
     * @return Avistamiento
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
     * Set especie
     *
     * @param \Indira\SimoniBundle\Entity\Especie $especie
     * @return Avistamiento
     */
    public function setEspecie(\Indira\SimoniBundle\Entity\Especie $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \Indira\SimoniBundle\Entity\Especie 
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * Set tipo
     *
     * @param \Indira\SimoniBundle\Entity\TipoAvistamiento $tipo
     * @return Avistamiento
     */
    public function setTipo(\Indira\SimoniBundle\Entity\TipoAvistamiento $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Indira\SimoniBundle\Entity\TipoAvistamiento 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set edad
     *
     * @param \Indira\SimoniBundle\Entity\Edad $edad
     * @return Avistamiento
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
     * Set municipio
     *
     * @param \Indira\SimoniBundle\Entity\Municipio $municipio
     * @return Avistamiento
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
     * @return Avistamiento
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
}
