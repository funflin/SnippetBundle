<?php

namespace Facebes\SnipperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * Facebes\SnipperBundle\Entity\Snipper
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Snipper
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
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var text $code
     *
     * @ORM\Column(name="code", type="text")
     */
    private $code;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    public function getTags()
    {
        return $this->tags;
    }	



    /**
     * Get id
     *
     * @return integer $id
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
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set code
     *
     * @param text $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return text $code
     */
    public function getCode()
    {
        return $this->code;
    }

    public function __construct()
    {   
    	$this->tags = new ArrayCollection();
    }


}