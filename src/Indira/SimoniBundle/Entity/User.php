<?php

namespace Indira\SimoniBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="Avistamiento", mappedBy="usuario")
     */
    protected $avistamientos;
    
    /**
     * @ORM\OneToMany(targetEntity="Denuncia", mappedBy="usuario")
     */
    protected $denuncias;
    
    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="user")
     */
    protected $documents;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nombre;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $apellidos;
    
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $identidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaDeNacimiento;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $telefono;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $direccion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="usuarios")
     */
    protected $departamento;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="usuarios")
     */
    protected $pais;
    
    /**
     * @ORM\ManyToOne(targetEntity="NivelEducativo", inversedBy="usuarios")
     */
    protected $nivelEducativo;
    
    public function __construct()
    {
        parent::__construct();
        $this->avistamientosImportados = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->denuncias = new \Doctrine\Common\Collections\ArrayCollection();
        // your own logic
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
     * Add avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     * @return User
     */
    public function addAvistamiento(\Indira\SimoniBundle\Entity\Avistamiento $avistamientos)
    {
        $this->avistamientos[] = $avistamientos;

        return $this;
    }

    /**
     * Remove avistamientos
     *
     * @param \Indira\SimoniBundle\Entity\Avistamiento $avistamientos
     */
    public function removeAvistamiento(\Indira\SimoniBundle\Entity\Avistamiento $avistamientos)
    {
        $this->avistamientos->removeElement($avistamientos);
    }

    /**
     * Get avistamientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvistamientos()
    {
        return $this->avistamientos;
    }

    /**
     * Add documents
     *
     * @param \Indira\SimoniBundle\Entity\Document $documents
     * @return User
     */
    public function addDocument(\Indira\SimoniBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \Indira\SimoniBundle\Entity\Document $documents
     */
    public function removeDocument(\Indira\SimoniBundle\Entity\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return User
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return User
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set identidad
     *
     * @param string $identidad
     * @return User
     */
    public function setIdentidad($identidad)
    {
        $this->identidad = $identidad;

        return $this;
    }

    /**
     * Get identidad
     *
     * @return string 
     */
    public function getIdentidad()
    {
        return $this->identidad;
    }

    /**
     * Set fechaDeNacimiento
     *
     * @param \DateTime $fechaDeNacimiento
     * @return User
     */
    public function setFechaDeNacimiento($fechaDeNacimiento)
    {
        $this->fechaDeNacimiento = $fechaDeNacimiento;

        return $this;
    }

    /**
     * Get fechaDeNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaDeNacimiento()
    {
        return $this->fechaDeNacimiento;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return User
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return User
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return User
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return User
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set nivelEducativo
     *
     * @param string $nivelEducativo
     * @return User
     */
    public function setNivelEducativo($nivelEducativo)
    {
        $this->nivelEducativo = $nivelEducativo;

        return $this;
    }

    /**
     * Get nivelEducativo
     *
     * @return string 
     */
    public function getNivelEducativo()
    {
        return $this->nivelEducativo;
    }

    /**
     * Add denuncias
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncias
     * @return User
     */
    public function addDenuncia(\Indira\SimoniBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias[] = $denuncias;

        return $this;
    }

    /**
     * Remove denuncias
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncias
     */
    public function removeDenuncia(\Indira\SimoniBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias->removeElement($denuncias);
    }

    /**
     * Get denuncias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDenuncias()
    {
        return $this->denuncias;
    }
}
