<?php

namespace Facebes\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facebes\SnippetBundle\Entity\Language
 *
 * @ORM\Table()
 * @ORM\Entity
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
        $this->icon = $icon;
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

}