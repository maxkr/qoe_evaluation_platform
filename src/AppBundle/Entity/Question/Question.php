<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="question_text", type="string", length=255)
     */

    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="QuestionGroup", inversedBy="questions")
     * @ORM\JoinColumn(name="questionGroup_id", referencedColumnName="id")
     */

    protected $group;

    /**
     * @ORM\Column(name="question_ordinance", type="integer")
     */

    protected $ordinance;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluation", inversedBy="questions")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */

    protected $evaluation;

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
     * @return Question
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
     * Set evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     *
     * @return Question
     */
    public function setEvaluation(\AppBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Remove Evaluation
     *
     */
    public function removeEvaluation()
    {
        $this->evaluation = null;
    }

    /**
     * Get evaluation
     *
     * @return \AppBundle\Entity\Evaluation
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
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
     * @return Question
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
     * Set type
     *
     * @param \AppBundle\Entity\Question\QuestionType $type
     *
     * @return Question
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

    /**
     * Set group
     *
     * @param \AppBundle\Entity\Question\QuestionGroup $group
     *
     * @return Question
     */
    public function setGroup(\AppBundle\Entity\Question\QuestionGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\Question\QuestionGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    public function __toString()
    {
        return strval($this->name);
    }
}
