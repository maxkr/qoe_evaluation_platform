<?php

namespace AppBundle\Repository\Question;
use Doctrine\ORM\Query\Expr\Join;

/**
 * AnswerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnswerRepository extends \Doctrine\ORM\EntityRepository
{

    public function findOneByGroup($group)
    {
        return $this->findOneBy(array('group' => $group));
    }
}
