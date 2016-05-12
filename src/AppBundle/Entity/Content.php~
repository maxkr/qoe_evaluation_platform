<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContentRepository")
 */
class Content
{
    /**
     * @var integer
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
     * @ORM\ManyToOne(targetEntity="Evaluation", inversedBy="contents")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */

    protected $evaluation;

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
     * @return Content
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
     * @return Content
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


    public function __toString()
    {
        return strval($this->name);
    }
}
