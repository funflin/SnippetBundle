<?php

namespace Facebes\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Facebes\SnippetBundle\Entity\Snippet
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Snippet
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

    /**
     * @ORM\Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable="true")
     *
     * @var DateTime $updatedAt
     */
    protected $updatedAt;



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

    /**
     * Get Tags
     *
     * @return ArrayCollection Facebes\SnippetBundle\Entity\Tag
     */

    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add tags
     *
     * @param Facebes\SnippetBundle\Entity\Tag $tags
     */
    public function addTags(\Facebes\SnippetBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    }


    /**
     * Set la fecha de creacion
     *
     * @return DateTime A DateTime object
     *
     */
    public function getCreatedAt()
    {
      return $this->createdAt;
    }



    /**
     * Set la fecha de creacion actualizacion
     *
     * @return DateTime A DateTime object
     */
    public function getUpdatedAt()
    {
      return $this->updatedAt;
    }

    /**
    *
    *
    * @ORM\PreUpdate
    */
    public function preUpdate()
    {
	$this->updatedAt = new \DateTime();
    }

    public function __construct()
    {
      	$this->tags = new ArrayCollection();
	$this->createdAt = new \DateTime();
    }

}