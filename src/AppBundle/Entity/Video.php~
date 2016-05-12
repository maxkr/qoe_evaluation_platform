<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideoRepository")
 */
class Video extends Content
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
     * @ORM\Column(name="videoName", type="string", length=255)
     */
    private $videoName;

    /**
     * @var string
     *
     * @ORM\Column(name="mpdPath", type="string", length=255)
     */
    private $mpdPath;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set videoName
     *
     * @param string $videoName
     *
     * @return Video
     */
    public function setVideoName($videoName)
    {
        $this->videoName = $videoName;

        return $this;
    }

    /**
     * Get videoName
     *
     * @return string
     */
    public function getVideoName()
    {
        return $this->videoName;
    }

    /**
     * Set mpdPath
     *
     * @param string $mpdPath
     *
     * @return Video
     */
    public function setMpdPath($mpdPath)
    {
        $this->mpdPath = $mpdPath;

        return $this;
    }

    /**
     * Get mpdPath
     *
     * @return string
     */
    public function getMpdPath()
    {
        return $this->mpdPath;
    }
}
