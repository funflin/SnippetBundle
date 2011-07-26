<?php

namespace Facebes\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Facebes\SnippetBundle\Entity\Language
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Language
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=25)
     */
    private $name;

    /**
     * @var string $syntax
     *
     * @ORM\Column(name="syntax", type="string", length=25)
     */
    private $syntax;

    /**
     * @var string $icon
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable="true")
     */
    private $icon;


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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set syntax
     *
     * @param string $syntax
     */
    public function setSyntax($syntax)
    {
        $this->syntax = $syntax;
    }

    /**
     * Get syntax
     *
     * @return string
     */
    public function getSyntax()
    {
        return $this->syntax;
    }

    /**
     * Set icon
     *
     * @param string $icon
     */
    public function setIcon($icon)
    {    
        $dest =  md5(uniqid()).'.'.$icon->guessExtension();
        $icon->move($this->getUploadRootDir(), $dest);
        
        $this->icon = $dest;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    public function __toString()
    {
      return $this->getName();
    }


    public function getFullPath()
    {
      return null === $this->icon ? null : $this->getUploadRootDir().'/'.$this->icon;
    }

    public function getViewPath()
    {
        return null === $this->icon ? null : 'uploads/languageicons/'.$this->icon;
    }
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploads/languageicons';
        return __DIR__.'/../../../../web/uploads/languageicons';
    }
//
//    /**
//     * @ORM\PrePersist()
//     */
//    public function preUpload()
//    {       
//        if (NULL !== $this->icon )
//        {
//            return $this->setIcon($this->icon->guessExtension());
//        }
//    }
//        
//     /**
//     * @ORM\PostPersist()
//     */
//    public function upload()
//    {
//        if (NULL === $this->icon )
//        {
//            return;
//        }
//        echo "hola";
//        $this->icon->Move($this->getUploadRootDir(), $this->id.$this->icon->guessExtension());
//        unset ($this->icon);
//    }
//
//     /**
//     * @ORM\PostRemove()
//     */
//    public function removeUpload()
//    {
//        if($file = $this->getFullPath())
//        {
//            unlink($file);
//        }
//    }
    
    
}