<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var int
     *
     * @ORM\Column(name="ordinance", type="integer")
     */
    private $ordinance;

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
     * @ORM\ManyToMany(targetEntity="Evaluation", mappedBy="contents")
     */

    protected $evaluations;

    /**
     * Content constructor.
     */

    public function __construct()
    {
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

    /**
     * Add evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     *
     * @return Content
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

    /**
     * Add metric
     *
     * @param \AppBundle\Entity\Metrics $metric
     *
     * @return Content
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
     * Set ordinance
     *
     * @param integer $ordinance
     *
     * @return Content
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
}
