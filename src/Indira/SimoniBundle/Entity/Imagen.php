<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Imagen
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="AvistamientoImportado", inversedBy="imagenes", cascade={"persist"})
     */
    protected $avistamientoImportado;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    protected $image;

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
     * Set avistamientoImportado
     *
     * @param \Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientoImportado
     * @return Imagen
     */
    public function setAvistamientoImportado(\Indira\SimoniBundle\Entity\AvistamientoImportado $avistamientoImportado = null)
    {
        $this->avistamientoImportado = $avistamientoImportado;

        return $this;
    }

    /**
     * Get avistamientoImportado
     *
     * @return \Indira\SimoniBundle\Entity\AvistamientoImportado 
     */
    public function getAvistamientoImportado()
    {
        return $this->avistamientoImportado;
    }

    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     * @return Imagen
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;
        
        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }
}
