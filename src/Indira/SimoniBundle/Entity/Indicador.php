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
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
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
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rango1;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rango2;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rango3;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rango4;
    
    public function __toString()
    {
        return $this->descripcion.'';
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

    /**
     * Set rango1
     *
     * @param string $rango1
     * @return Indicador
     */
    public function setRango1($rango1)
    {
        $this->rango1 = $rango1;

        return $this;
    }

    /**
     * Get rango1
     *
     * @return string 
     */
    public function getRango1()
    {
        return $this->rango1;
    }

    /**
     * Set rango2
     *
     * @param string $rango2
     * @return Indicador
     */
    public function setRango2($rango2)
    {
        $this->rango2 = $rango2;

        return $this;
    }

    /**
     * Get rango2
     *
     * @return string 
     */
    public function getRango2()
    {
        return $this->rango2;
    }

    /**
     * Set rango3
     *
     * @param string $rango3
     * @return Indicador
     */
    public function setRango3($rango3)
    {
        $this->rango3 = $rango3;

        return $this;
    }

    /**
     * Get rango3
     *
     * @return string 
     */
    public function getRango3()
    {
        return $this->rango3;
    }

    /**
     * Set rango4
     *
     * @param string $rango4
     * @return Indicador
     */
    public function setRango4($rango4)
    {
        $this->rango4 = $rango4;

        return $this;
    }

    /**
     * Get rango4
     *
     * @return string 
     */
    public function getRango4()
    {
        return $this->rango4;
    }
}
