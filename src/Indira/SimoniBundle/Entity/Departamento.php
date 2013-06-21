<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Departamento
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
     * @ORM\OneToMany(targetEntity="User", mappedBy="departamento")
     */
    protected $usuarios;
    
    public function __toString()
    {
        return $this->nombre;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Departamento
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
     * Set color
     *
     * @param string $color
     * @return Departamento
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
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuarios
     *
     * @param \Indira\SimoniBundle\Entity\User $usuarios
     * @return Departamento
     */
    public function addUsuario(\Indira\SimoniBundle\Entity\User $usuarios)
    {
        $this->usuarios[] = $usuarios;

        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Indira\SimoniBundle\Entity\User $usuarios
     */
    public function removeUsuario(\Indira\SimoniBundle\Entity\User $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
