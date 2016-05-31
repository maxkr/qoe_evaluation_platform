<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 31.05.16
 * Time: 16:06
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Question\Question;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TestQuestions implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $question1 = new Question();
        $question1->setName("Test_Question_1");
        $question1->setOrdinance(1);
        $question1->setAppearance("pre");
        $manager->persist($question1);

        $question2 = new Question();
        $question2->setName("Test_Question_2");
        $question2->setOrdinance(2);
        $question2->setAppearance("pre");
        $manager->persist($question2);

        $question3 = new Question();
        $question3->setName("Test_Question_3");
        $question3->setOrdinance(3);
        $question3->setAppearance("pre");
        $manager->persist($question3);

        $question4 = new Question();
        $question4->setName("Test_Question_4");
        $question4->setOrdinance(4);
        $question4->setAppearance("pre");
        $manager->persist($question4);

        $question5 = new Question();
        $question5->setName("Test_Question_5");
        $question5->setOrdinance(5);
        $question5->setAppearance("pre");
        $manager->persist($question5);

        $manager->flush();
    }
}