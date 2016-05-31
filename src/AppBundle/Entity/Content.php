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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="path", type="string")
     */
    private $path;

    /**
     * @var integer
     * @ORM\Column(name="playback_offset", type="integer", nullable=true)
     */
    private $playbackOffset;

    /**
     * @var integer
     * @ORM\Column(name="playback_duration", type="integer", nullable=true)
     */
    private $playbackDuration;

    /**
     * @var integer
     * @ORM\Column(name="rating_time", type="integer", nullable=true)
     */
    private $ratingTime;

    /**
     * @var integer
     * @ORM\Column(name="rating_lower_bound", type="integer", nullable=true)
     */
    private $ratingLowerBound;

    /**
     * @var integer
     * @ORM\Column(name="rating_upper_bound", type="integer", nullable=true)
     */
    private $ratingUpperBound;

    /**
     * @ORM\ManyToOne(targetEntity="Evaluation", inversedBy="contents")
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
     * Get evaluation
     *
     * @return \AppBundle\Entity\Evaluation 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Remove Evaluation
     *
     */
    public function removeEvaluation()
    {
        $this->evaluation = null;
    }


    public function __toString()
    {
        return strval($this->name);
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Content
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set playbackOffset
     *
     * @param integer $playbackOffset
     *
     * @return Content
     */
    public function setPlaybackOffset($playbackOffset)
    {
        $this->playbackOffset = $playbackOffset;

        return $this;
    }

    /**
     * Get playbackOffset
     *
     * @return integer
     */
    public function getPlaybackOffset()
    {
        return $this->playbackOffset;
    }

    /**
     * Set playbackDuration
     *
     * @param integer $playbackDuration
     *
     * @return Content
     */
    public function setPlaybackDuration($playbackDuration)
    {
        $this->playbackDuration = $playbackDuration;

        return $this;
    }

    /**
     * Get playbackDuration
     *
     * @return integer
     */
    public function getPlaybackDuration()
    {
        return $this->playbackDuration;
    }

    /**
     * Set ratingTime
     *
     * @param integer $ratingTime
     *
     * @return Content
     */
    public function setRatingTime($ratingTime)
    {
        $this->ratingTime = $ratingTime;

        return $this;
    }

    /**
     * Get ratingTime
     *
     * @return integer
     */
    public function getRatingTime()
    {
        return $this->ratingTime;
    }

    /**
     * Set ratingLowerBound
     *
     * @param integer $ratingLowerBound
     *
     * @return Content
     */
    public function setRatingLowerBound($ratingLowerBound)
    {
        $this->ratingLowerBound = $ratingLowerBound;

        return $this;
    }

    /**
     * Get ratingLowerBound
     *
     * @return integer
     */
    public function getRatingLowerBound()
    {
        return $this->ratingLowerBound;
    }

    /**
     * Set ratingUpperBound
     *
     * @param integer $ratingUpperBound
     *
     * @return Content
     */
    public function setRatingUpperBound($ratingUpperBound)
    {
        $this->ratingUpperBound = $ratingUpperBound;

        return $this;
    }

    /**
     * Get ratingUpperBound
     *
     * @return integer
     */
    public function getRatingUpperBound()
    {
        return $this->ratingUpperBound;
    }
}
