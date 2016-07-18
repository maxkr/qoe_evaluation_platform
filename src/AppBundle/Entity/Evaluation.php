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
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $name;

    /**
     * @ORM\Column(type="string", length=65535, nullable=true)
     */

    private $intro;

    /**
     * @ORM\Column(type="string", length=65535, nullable=true)
     */

    private $disclaimer;


    /**
     * @ORM\ManyToMany(targetEntity="Content", inversedBy="evaluations")
     * @ORM\OrderBy({"ordinance" = "ASC"})
     */

    private $contents;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Metrics", inversedBy="evaluations")
     */

    private $metrics;


    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="evaluations")
     */

    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Question\Question", inversedBy="evaluations")
     * @ORM\OrderBy({"ordinance" = "ASC"})
     */

    private $questions;

    /**
     * @ORM\ManyToOne(targetEntity="EvaluationType", inversedBy="evaluations")
     */

    private $type;

    /**
     * Evaluation constructor.
     */

    public function __construct()
    {
        $this->contents     = new ArrayCollection();
        $this->metrics      = new ArrayCollection();
        $this->users        = new ArrayCollection();
        $this->questions    = new ArrayCollection();
    }

    /**
     * @return string
     */

    public function __toString()
    {
        return strval($this->name);
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
     * Set intro
     *
     * @param string $intro
     *
     * @return Evaluation
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set disclaimer
     *
     * @param string $disclaimer
     *
     * @return Evaluation
     */
    public function setDisclaimer($disclaimer)
    {
        $this->disclaimer = $disclaimer;

        return $this;
    }

    /**
     * Get disclaimer
     *
     * @return string
     */
    public function getDisclaimer()
    {
        return $this->disclaimer;
    }

    /**
     * Add content
     *
     * @param \AppBundle\Entity\Content $content
     *
     * @return Evaluation
     */
    public function addContent(\AppBundle\Entity\Content $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \AppBundle\Entity\Content $content
     */
    public function removeContent(\AppBundle\Entity\Content $content)
    {
        $this->contents->removeElement($content);
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
     * Add metric
     *
     * @param \AppBundle\Entity\Metrics $metric
     *
     * @return Evaluation
     */
    public function addMetric(\AppBundle\Entity\Metrics $metric)
    {
        $this->metrics[] = $metric;

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

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question\Question $question
     *
     * @return Evaluation
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
}
