<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Tests\StringableObject;

/**
 * EvaluationContentResult
 *
 * @ORM\Table(name="evaluation_content_result")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationContentResultRepository")
 */
class EvaluationContentResult
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Content")
     *
     */
    private $content;

    /**
     * @ORM\Column(name="bfchange", type="text")
     */

    private $bfchange;

    /**
     * @ORM\Column(name="fingerprint", type="text")
     */

    private $fingerprint;

    /**
     * @ORM\Column(name="fullscreen", type="text")
     */

    private $fullscreen;

    /**
     * @ORM\Column(name="buffer", type="text")
     */

    private $buffer;

    /**
     * @ORM\Column(name="representationBitrate", type="text")
     */

    private $representationBitrate;

    /**
     * @ORM\Column(name="guessedBw", type="text")
     */

    private $guessedBw;

    /**
     * @ORM\Column(name="pauses", type="text")
     */

    private $pauses;

    /**
     * @ORM\Column(name="stalls", type="text")
     */

    private $stalls;

    /**
     * @ORM\Column(name="startupTime", type="text")
     */

    private $startupTime;

    /**
     * @ORM\Column(name="videoTimes", type="text")
     */

    private $videoTimes;

    /**
     * @ORM\Column(name="playerType", type="text")
     */

    private $playerType;


   
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
     * Set bfchange
     *
     * @param string $bfchange
     *
     * @return EvaluationContentResult
     */
    public function setBfchange($bfchange)
    {
        $this->bfchange = $bfchange;

        return $this;
    }

    /**
     * Get bfchange
     *
     * @return string
     */
    public function getBfchange()
    {
        return $this->bfchange;
    }

    /**
     * Set fingerprint
     *
     * @param string $fingerprint
     *
     * @return EvaluationContentResult
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * Get fingerprint
     *
     * @return string
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * Set fullscreen
     *
     * @param string $fullscreen
     *
     * @return EvaluationContentResult
     */
    public function setFullscreen($fullscreen)
    {
        $this->fullscreen = $fullscreen;

        return $this;
    }

    /**
     * Get fullscreen
     *
     * @return string
     */
    public function getFullscreen()
    {
        return $this->fullscreen;
    }

    /**
     * Set buffer
     *
     * @param string $buffer
     *
     * @return EvaluationContentResult
     */
    public function setBuffer($buffer)
    {
        $this->buffer = $buffer;

        return $this;
    }

    /**
     * Get buffer
     *
     * @return string
     */
    public function getBuffer()
    {
        return $this->buffer;
    }

    /**
     * Set representationBitrate
     *
     * @param string $representationBitrate
     *
     * @return EvaluationContentResult
     */
    public function setRepresentationBitrate($representationBitrate)
    {
        $this->representationBitrate = $representationBitrate;

        return $this;
    }

    /**
     * Get representationBitrate
     *
     * @return string
     */
    public function getRepresentationBitrate()
    {
        return $this->representationBitrate;
    }

    /**
     * Set guessedBw
     *
     * @param string $guessedBw
     *
     * @return EvaluationContentResult
     */
    public function setGuessedBw($guessedBw)
    {
        $this->guessedBw = $guessedBw;

        return $this;
    }

    /**
     * Get guessedBw
     *
     * @return string
     */
    public function getGuessedBw()
    {
        return $this->guessedBw;
    }

    /**
     * Set pauses
     *
     * @param string $pauses
     *
     * @return EvaluationContentResult
     */
    public function setPauses($pauses)
    {
        $this->pauses = $pauses;

        return $this;
    }

    /**
     * Get pauses
     *
     * @return string
     */
    public function getPauses()
    {
        return $this->pauses;
    }

    /**
     * Set stalls
     *
     * @param string $stalls
     *
     * @return EvaluationContentResult
     */
    public function setStalls($stalls)
    {
        $this->stalls = $stalls;

        return $this;
    }

    /**
     * Get stalls
     *
     * @return string
     */
    public function getStalls()
    {
        return $this->stalls;
    }

    /**
     * Set startupTime
     *
     * @param string $startupTime
     *
     * @return EvaluationContentResult
     */
    public function setStartupTime($startupTime)
    {
        $this->startupTime = $startupTime;

        return $this;
    }

    /**
     * Get startupTime
     *
     * @return string
     */
    public function getStartupTime()
    {
        return $this->startupTime;
    }

    /**
     * Set videoTimes
     *
     * @param string $videoTimes
     *
     * @return EvaluationContentResult
     */
    public function setVideoTimes($videoTimes)
    {
        $this->videoTimes = $videoTimes;

        return $this;
    }

    /**
     * Get videoTimes
     *
     * @return string
     */
    public function getVideoTimes()
    {
        return $this->videoTimes;
    }

    /**
     * Set playerType
     *
     * @param string $playerType
     *
     * @return EvaluationContentResult
     */
    public function setPlayerType($playerType)
    {
        $this->playerType = $playerType;

        return $this;
    }

    /**
     * Get playerType
     *
     * @return string
     */
    public function getPlayerType()
    {
        return $this->playerType;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return EvaluationContentResult
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
     * @return EvaluationContentResult
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
     * Set content
     *
     * @param \AppBundle\Entity\Content $content
     *
     * @return EvaluationContentResult
     */
    public function setContent(\AppBundle\Entity\Content $content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \AppBundle\Entity\Content
     */
    public function getContent()
    {
        return $this->content;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
