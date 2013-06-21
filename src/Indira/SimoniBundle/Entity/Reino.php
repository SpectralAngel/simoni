<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reino
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reino
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
     * @ORM\OneToMany(targetEntity="Especie", mappedBy="reino")
     */
    protected $especies;
    /**
     * @ORM\OneToMany(targetEntity="TipoAvistamiento", mappedBy="reino")
     */
    protected $tiposAvistamiento;
    
    /**
     * @ORM\OneToMany(targetEntity="Clase", mappedBy="reino")
     */
    protected $clases;
    
    /**
     * @ORM\OneToMany(targetEntity="Edad", mappedBy="reino")
     */
    protected $edades;

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
     * @return Reino
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
     * Add especies
     *
     * @param \Indira\SimoniBundle\Entity\Especie $especies
     * @return Reino
     */
    public function addEspecy(\Indira\SimoniBundle\Entity\Especie $especies)
    {
        $this->especies[] = $especies;

        return $this;
    }

    /**
     * Remove especies
     *
     * @param \Indira\SimoniBundle\Entity\Especie $especies
     */
    public function removeEspecy(\Indira\SimoniBundle\Entity\Especie $especies)
    {
        $this->especies->removeElement($especies);
    }

    /**
     * Get especies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspecies()
    {
        return $this->especies;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Reino
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
     * Add tiposAvistamiento
     *
     * @param \Indira\SimoniBundle\Entity\TipoAvistamiento $tiposAvistamiento
     * @return Reino
     */
    public function addTiposAvistamiento(\Indira\SimoniBundle\Entity\TipoAvistamiento $tiposAvistamiento)
    {
        $this->tiposAvistamiento[] = $tiposAvistamiento;

        return $this;
    }

    /**
     * Remove tiposAvistamiento
     *
     * @param \Indira\SimoniBundle\Entity\TipoAvistamiento $tiposAvistamiento
     */
    public function removeTiposAvistamiento(\Indira\SimoniBundle\Entity\TipoAvistamiento $tiposAvistamiento)
    {
        $this->tiposAvistamiento->removeElement($tiposAvistamiento);
    }

    /**
     * Get tiposAvistamiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTiposAvistamiento()
    {
        return $this->tiposAvistamiento;
    }

    /**
     * Add clases
     *
     * @param \Indira\SimoniBundle\Entity\Clase $clases
     * @return Reino
     */
    public function addClase(\Indira\SimoniBundle\Entity\Clase $clases)
    {
        $this->clases[] = $clases;

        return $this;
    }

    /**
     * Remove clases
     *
     * @param \Indira\SimoniBundle\Entity\Clase $clases
     */
    public function removeClase(\Indira\SimoniBundle\Entity\Clase $clases)
    {
        $this->clases->removeElement($clases);
    }

    /**
     * Get clases
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClases()
    {
        return $this->clases;
    }

    /**
     * Add edades
     *
     * @param \Indira\SimoniBundle\Entity\Edades $edades
     * @return Reino
     */
    public function addEdad(\Indira\SimoniBundle\Entity\Edad $edades)
    {
        $this->edades[] = $edades;

        return $this;
    }

    /**
     * Remove edades
     *
     * @param \Indira\SimoniBundle\Entity\Edades $edades
     */
    public function removeEdad(\Indira\SimoniBundle\Entity\Edad $edades)
    {
        $this->edades->removeElement($edades);
    }

    /**
     * Get edades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEdades()
    {
        return $this->edades;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->especies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tiposAvistamiento = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clases = new \Doctrine\Common\Collections\ArrayCollection();
        $this->edades = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add edades
     *
     * @param \Indira\SimoniBundle\Entity\Edad $edades
     * @return Reino
     */
    public function addEdade(\Indira\SimoniBundle\Entity\Edad $edades)
    {
        $this->edades[] = $edades;

        return $this;
    }

    /**
     * Remove edades
     *
     * @param \Indira\SimoniBundle\Entity\Edad $edades
     */
    public function removeEdade(\Indira\SimoniBundle\Entity\Edad $edades)
    {
        $this->edades->removeElement($edades);
    }
}
