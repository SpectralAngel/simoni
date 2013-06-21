<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pais
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
     * @ORM\Column(name="bandera", type="string", length=255)
     */
    private $bandera;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="pais")
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
     * @return Pais
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
     * Set bandera
     *
     * @param string $bandera
     * @return Pais
     */
    public function setBandera($bandera)
    {
        $this->bandera = $bandera;

        return $this;
    }

    /**
     * Get bandera
     *
     * @return string 
     */
    public function getBandera()
    {
        return $this->bandera;
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
     * @return Pais
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
