<?php

namespace Indira\SimoniBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
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
     * @ORM\OneToMany(targetEntity="Document", mappedBy="user")
     */
    protected $documents;
    
    public function __construct()
    {
        parent::__construct();
        $this->avistamientosImportados = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
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
}
