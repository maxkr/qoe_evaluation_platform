<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionGroup
 *
 * @ORM\Table(name="question_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\QuestionGroupRepository")
 */
class QuestionGroup
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="QuestionType", inversedBy="groups")
     * @ORM\JoinColumn(name="questionType_id", referencedColumnName="id")
     */

    protected $type;

    /**
     * @var int
     *
     * @ORM\Column(name="ordinance", type="integer", unique=true)
     */
    private $ordinance;

    /**
     * @var string
     *
     * @ORM\Column(name="appearance", type="string", length=255)
     */
    private $appearance;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question\Question", mappedBy="group", cascade={"persist", "remove"})
     */

    protected $questions;


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
     * Set name
     *
     * @param string $name
     *
     * @return QuestionGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set ordinance
     *
     * @param integer $ordinance
     *
     * @return QuestionGroup
     */
    public function setOrdinance($ordinance)
    {
        $this->ordinance = $ordinance;

        return $this;
    }

    /**
     * Get ordinance
     *
     * @return integer
     */
    public function getOrdinance()
    {
        return $this->ordinance;
    }

    /**
     * Set appearance
     *
     * @param string $appearance
     *
     * @return QuestionGroup
     */
    public function setAppearance($appearance)
    {
        $this->appearance = $appearance;

        return $this;
    }

    /**
     * Get appearance
     *
     * @return string
     */
    public function getAppearance()
    {
        return $this->appearance;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return QuestionGroup
     */
    public function addQuestion(\AppBundle\Entity\Question\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\Question\QuestionType $type
     *
     * @return QuestionGroup
     */
    public function setType(\AppBundle\Entity\Question\QuestionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\Question\QuestionType
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return strval($this->name);
    }
}
