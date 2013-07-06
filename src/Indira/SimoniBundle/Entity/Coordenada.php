<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordenada
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Coordenada
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
     * @ORM\ManyToOne(targetEntity="Denuncia", inversedBy="coordenadas", cascade={"persist"})
     */
    protected $denuncia;
    
    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="decimal", nullable=true, precision=9, scale=2)
     */
    private $latitud;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="decimal", nullable=true, precision=9, scale=2)
     */
    private $longitud;

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
     * Set latitud
     *
     * @param float $latitud
     * @return Coordenada
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
     * @return Coordenada
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
     * Set denuncia
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncia
     * @return Coordenada
     */
    public function setDenuncia(\Indira\SimoniBundle\Entity\Denuncia $denuncia = null)
    {
        $this->denuncia = $denuncia;

        return $this;
    }

    /**
     * Get denuncia
     *
     * @return \Indira\SimoniBundle\Entity\Denuncia 
     */
    public function getDenuncia()
    {
        return $this->denuncia;
    }
}
