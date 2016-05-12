<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionType
 *
 * @ORM\Table(name="question_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\QuestionTypeRepository")
 */
class QuestionType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="questionType", type="string", length=255, unique=true)
     */
    private $type;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question\QuestionGroup", mappedBy="type", cascade={"persist", "remove"})
     */

    protected $groups;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return QuestionType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Add group
     *
     * @param \AppBundle\Entity\Question\QuestionGroup $group
     *
     * @return QuestionType
     */
    public function addGroup(\AppBundle\Entity\Question\QuestionGroup $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\Question\QuestionGroup $group
     */
    public function removeGroup(\AppBundle\Entity\Question\QuestionGroup $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    public function __toString()
    {
        return strval($this->type);
    }
}
