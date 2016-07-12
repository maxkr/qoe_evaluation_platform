<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Result
 *
 * @ORM\Table(name="evaluation_question_result")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\EvaluationQuestionResultRepository")
 */
class EvaluationQuestionResult
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluation")
     */
    private $evaluation;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question\Question")
     *
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Question\Answer")
     *
     */
    private $answers;

    /**
     * @var string
     *
     * @ORM\Column(name="text_answer", type="string", length=255, nullable=true)
     */
    private $textanswer;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * EvaluationQuestionResult constructor.
     *
     */

    public function __construct()
    {
        $this->answers = new ArrayCollection();

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
     * Set textanswer
     *
     * @param string $textanswer
     *
     * @return EvaluationQuestionResult
     */
    public function setTextanswer($textanswer)
    {
        $this->textanswer = $textanswer;

        return $this;
    }

    /**
     * Get textanswer
     *
     * @return string
     */
    public function getTextanswer()
    {
        return $this->textanswer;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return EvaluationQuestionResult
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return EvaluationQuestionResult
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     *
     * @return EvaluationQuestionResult
     */
    public function setEvaluation(\AppBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
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
     * Set question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return EvaluationQuestionResult
     */
    public function setQuestion(\AppBundle\Entity\Question\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Question\Answer $answer
     *
     * @return EvaluationQuestionResult
     */
    public function addAnswer(\AppBundle\Entity\Question\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \AppBundle\Entity\Question\Answer $answer
     */
    public function removeAnswer(\AppBundle\Entity\Question\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
