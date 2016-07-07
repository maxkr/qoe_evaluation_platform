<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 08.03.16
 * Time: 18:22
 */

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationRepository")
 */

class Evaluation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Content", mappedBy="evaluation")
     */


    protected $contents;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="evaluations")
     */

    protected $users;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question\Question", mappedBy="evaluation")
     */

    protected $questions;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Metrics", mappedBy="evaluation")
     */

    protected $metrics;


    /**
     * @ORM\ManyToOne(targetEntity="EvaluationType", inversedBy="evaluations")
     */

    protected $type;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->questions = new ArrayCollection();
        $this->metrics = new ArrayCollection();
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
     * @return Evaluation
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
     * Add contents
     *
     * @param \AppBundle\Entity\Content $contents
     * @return Evaluation
     */
    public function addContent(\AppBundle\Entity\Content $contents)
    {
        if (!$this->contents->contains($contents)){
            $this->contents[] = $contents;
            $contents->setEvaluation($this);
        }

        return $this;
    }

    /**
     * Remove contents
     *
     * @param \AppBundle\Entity\Content $contents
     */
    public function removeContent(\AppBundle\Entity\Content $contents)
    {
        $this->contents->removeElement($contents);
        $contents->removeEvaluation();
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->contents;
    }


    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return Evaluation
     */
    public function addQuestion(\AppBundle\Entity\Question\Question $question)
    {
        if (!$this->questions->contains($question)){
            $this->questions[] = $question;
            $question->setEvaluation($this);
        }

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
        $question->removeEvaluation();
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

    public function __toString()
    {
        return strval($this->name);
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\EvaluationType $type
     *
     * @return Evaluation
     */
    public function setType(\AppBundle\Entity\EvaluationType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\EvaluationType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add metric
     *
     * @param \AppBundle\Entity\Metrics $metric
     *
     * @return Evaluation
     */
    public function addMetric(\AppBundle\Entity\Metrics $metric)
    {

        if (!$this->metrics->contains($metric)) {
            $this->metrics[] = $metric;
            $metric->setEvaluation($this);
        }

        return $this;
    }

    /**
     * Remove metric
     *
     * @param \AppBundle\Entity\Metrics $metric
     */
    public function removeMetric(\AppBundle\Entity\Metrics $metric)
    {
        $this->metrics->removeElement($metric);
    }

    /**
     * Get metrics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetrics()
    {
        return $this->metrics;
    }



    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Evaluation
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
