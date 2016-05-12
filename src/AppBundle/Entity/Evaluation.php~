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
     * @ORM\Column(type="string", length=100)
     */

    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="evaluation")
     */

    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="Content", mappedBy="evaluation")
     */


    protected $contents;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question\Question", mappedBy="evaluation", cascade={"persist", "remove"})
     */

    protected $questions;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->questions = new ArrayCollection();
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
     * Add users
     *
     * @param \AppBundle\Entity\User $users
     * @return Evaluation
     */
    public function addUser(\AppBundle\Entity\User $users)
    {
        if (!$this->users->contains($users)) {
            $this->users[] = $users;
            $users->removeEvaluation();
        }

        return $this;
    }

    /**
     * Remove users
     *
     * @param \AppBundle\Entity\User $users
     */
    public function removeUser(\AppBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
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
}
