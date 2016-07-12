<?php

namespace AppBundle\Entity\Question;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="QuestionType", inversedBy="questions")
     */

    protected $type;

    /**
     * @var int
     *
     * @ORM\Column(name="ordinance", type="integer")
     */
    private $ordinance;

    /**
     * @var string
     *
     * @ORM\Column(name="appearance", type="string", length=255)
     */
    private $appearance;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Question\Answer", inversedBy="questions")
     */

    protected $answers;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Evaluation", mappedBy="questions")
     */

    protected $evaluations;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers      = new ArrayCollection();
        $this->evaluations  = new ArrayCollection();
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
     * Set appearance
     *
     * @param string $appearance
     *
     * @return Question
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
     * Add answer
     *
     * @param \AppBundle\Entity\Question\Answer $answer
     *
     * @return Question
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

    /**
     * Add evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     *
     * @return Question
     */
    public function addEvaluation(\AppBundle\Entity\Evaluation $evaluation)
    {
        $this->evaluations[] = $evaluation;

        return $this;
    }

    /**
     * Remove evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     */
    public function removeEvaluation(\AppBundle\Entity\Evaluation $evaluation)
    {
        $this->evaluations->removeElement($evaluation);
    }

    /**
     * Get evaluations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluations()
    {
        return $this->evaluations;
    }
}
