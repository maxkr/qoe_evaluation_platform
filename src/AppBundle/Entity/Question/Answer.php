<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\AnswerRepository")
 */
class Answer
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */

    private $text;

    /**
     * @ORM\Column(name="ordinance", type="integer")
     */

    private $ordinance;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Question\Question", mappedBy="answers")
     */

    protected $questions;

    /**
     * Answer constructor.
     */

    public function __construct()
    {
        $this->questions      = new ArrayCollection();
    }

    /**
     * @return string
     */

    public function __toString()
    {
        return strval("{$this->name} (order: {$this->ordinance})");
    }

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
     *
     * @return Answer
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
     * Set text
     *
     * @param string $text
     *
     * @return Answer
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set ordinance
     *
     * @param integer $ordinance
     *
     * @return Answer
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
     * Add question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return Answer
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
