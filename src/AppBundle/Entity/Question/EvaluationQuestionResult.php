<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question\Answer")
     *
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="text_answer", type="string", length=255)
     */
    private $textanswer;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}