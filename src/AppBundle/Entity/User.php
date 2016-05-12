<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * User
 *
 * @ORM\Table("fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Evaluation", inversedBy="users")
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
     * Set evaluation
     *
     * @param \AppBundle\Entity\Evaluation $evaluation
     * @return User
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
        return strval($this->username);
    }
}
