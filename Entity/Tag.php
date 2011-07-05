<?php

namespace Facebes\SnippetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Facebes\SnippetBundle\Entity\Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tag
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
     *
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
    * @ORM\OneToMany(targetEntity="Tag", mappedBy="parent")
    */
    private $children;

    /**
    * @ORM\ManyToOne(targetEntity="Tag", inversedBy="children")
    */
    private $parent;

    /**
     * Get parent id
     *
     * @return integer $parent
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * set parent id
     *
     * @param integer $tagParent
     */
    public function setParent($tagParent)
    {
       $this->parent = $tagParent;
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __toString()
    {
	return $this->getName();
    }

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * Add children
     *
     * @param Facebes\SnippetBundle\Entity\Tag $children
     */
    public function addChildren(\Facebes\SnippetBundle\Entity\Tag $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection $children
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Has children
     *
     * @return bool $haschildren
     */
    public function hasChildren()
    {
	return !$this->children->isEmpty();
    }

}