<?php

namespace Indira\SimoniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ImagenDenuncia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Denuncia", inversedBy="imagenes", cascade={"persist"})
     */
    protected $denuncia;
    
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
     * Set denuncia
     *
     * @param \Indira\SimoniBundle\Entity\Denuncia $denuncia
     * @return ImagenDenuncia
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

    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     * @return ImagenDenuncia
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
