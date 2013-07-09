<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indicador
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Indicador
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;
    
    /**
     * @ORM\ManyToOne(targetEntity="AtributoClave", inversedBy="indicadores")
     */
    protected $atributoclave;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoIndicador", inversedBy="indicadores")
     */
    protected $tipo;
    
    public function __toString()
    {
        return $this->descripcion;
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Indicador
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
     * Set nivel
     *
     * @param integer $nivel
     * @return Indicador
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set atributoclave
     *
     * @param \Indira\SimoniBundle\Entity\AtributoClave $atributoclave
     * @return Indicador
     */
    public function setAtributoclave(\Indira\SimoniBundle\Entity\AtributoClave $atributoclave = null)
    {
        $this->atributoclave = $atributoclave;

        return $this;
    }

    /**
     * Get atributoclave
     *
     * @return \Indira\SimoniBundle\Entity\AtributoClave 
     */
    public function getAtributoclave()
    {
        return $this->atributoclave;
    }

    /**
     * Set tipo
     *
     * @param \Indira\SimoniBundle\Entity\TipoIndicador $tipo
     * @return Indicador
     */
    public function setTipo(\Indira\SimoniBundle\Entity\TipoIndicador $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Indira\SimoniBundle\Entity\TipoIndicador 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
