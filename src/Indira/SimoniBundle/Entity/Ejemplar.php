<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ejemplar
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ejemplar
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
     * @ORM\ManyToOne(targetEntity="Sexo", inversedBy="ejemplares")
     */
    protected $sexo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Edad", inversedBy="ejemplares")
     */
    protected $edad;
    
    /**
     * @ORM\ManyToOne(targetEntity="AvistamientoImportado", inversedBy="ejemplares")
     */
    protected $avistamiento;
    
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
     * Set sexo
     *
     * @param \Indira\SimoniBundle\Entity\Sexo $sexo
     * @return Ejemplar
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
     * Set edad
     *
     * @param \Indira\SimoniBundle\Entity\Edad $edad
     * @return Ejemplar
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
     * Set avistamiento
     *
     * @param \Indira\SimoniBundle\Entity\AvistamientoImportado $avistamiento
     * @return Ejemplar
     */
    public function setAvistamiento(\Indira\SimoniBundle\Entity\AvistamientoImportado $avistamiento = null)
    {
        $this->avistamiento = $avistamiento;

        return $this;
    }

    /**
     * Get avistamiento
     *
     * @return \Indira\SimoniBundle\Entity\AvistamientoImportado 
     */
    public function getAvistamiento()
    {
        return $this->avistamiento;
    }
}
