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
     * @ORM\Column(name="question_type", type="string", length=255, unique=true)
     */
    private $type;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question\Question", mappedBy="type")
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

    public function __toString()
    {
        return strval($this->type);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return QuestionType
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
}
