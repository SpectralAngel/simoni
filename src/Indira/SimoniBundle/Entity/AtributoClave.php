<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AtributoClave
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AtributoClave
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
     * @ORM\OneToMany(targetEntity="Indicador", mappedBy="atributoclave")
     */
    protected $indicadores;
    
    /**
     * @ORM\ManyToOne(targetEntity="Beneficiario", inversedBy="atributosclave")
     */
    protected $beneficiario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     */
    protected $base;
    
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
     * @return AtributoClave
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
     * Constructor
     */
    public function __construct()
    {
        $this->indicadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add indicadores
     *
     * @param \Indira\SimoniBundle\Entity\Indicador $indicadores
     * @return AtributoClave
     */
    public function addIndicadore(\Indira\SimoniBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores[] = $indicadores;

        return $this;
    }

    /**
     * Remove indicadores
     *
     * @param \Indira\SimoniBundle\Entity\Indicador $indicadores
     */
    public function removeIndicadore(\Indira\SimoniBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores->removeElement($indicadores);
    }

    /**
     * Get indicadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIndicadores()
    {
        return $this->indicadores;
    }

    /**
     * Set beneficiario
     *
     * @param \Indira\SimoniBundle\Entity\Beneficiario $beneficiario
     * @return AtributoClave
     */
    public function setBeneficiario(\Indira\SimoniBundle\Entity\Beneficiario $beneficiario = null)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return \Indira\SimoniBundle\Entity\Beneficiario 
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }
}
