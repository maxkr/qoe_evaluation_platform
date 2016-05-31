<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 31.05.16
 * Time: 16:06
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Evaluation;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TestEvaluations implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $evaluation1 = new Evaluation();
        $evaluation1->setName("Test_Evaluation_1");
        $manager->persist($evaluation1);

        $evaluation2 = new Evaluation();
        $evaluation2->setName("Test_Evaluation_2");
        $manager->persist($evaluation2);

        $evaluation3 = new Evaluation();
        $evaluation3->setName("Test_Evaluation_3");
        $manager->persist($evaluation3);

        $evaluation4 = new Evaluation();
        $evaluation4->setName("Test_Evaluation_4");
        $manager->persist($evaluation4);

        $evaluation5 = new Evaluation();
        $evaluation5->setName("Test_Evaluation_5");
        $manager->persist($evaluation5);

        $manager->flush();
    }
}