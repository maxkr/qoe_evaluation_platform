<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 31.05.16
 * Time: 16:06
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TestUsers implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername("Test_User_1");
        $user1->setEmail("user1@test.com");
        $user1->setPassword("password");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername("Test_User_2");
        $user2->setEmail("user2@test.com");
        $user2->setPassword("password");
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername("Test_User_3");
        $user3->setEmail("user3@test.com");
        $user3->setPassword("password");
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUsername("Test_User_4");
        $user4->setEmail("user4@test.com");
        $user4->setPassword("password");
        $manager->persist($user4);

        $user5 = new User();
        $user5->setUsername("Test_User_5");
        $user5->setEmail("user5@test.com");
        $user5->setPassword("password");
        $manager->persist($user5);

        $manager->flush();
    }
}