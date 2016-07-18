<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 31.05.16
 * Time: 16:06
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Content;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TestContents implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $content1 = new Content();
        $content1->setName("Test_Content_1");
        $content1->setPath("https://bitdash-a.akamaihd.net/content/MI201109210084_1/mpds/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.mpd");
        $content1->setOrdinance(1);
        $manager->persist($content1);

        $content2 = new Content();
        $content2->setName("Test_Content_2");
        $content2->setPath("https://bitdash-a.akamaihd.net/content/MI201109210084_1/mpds/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.mpd");
        $content2->setOrdinance(2);
        $manager->persist($content2);

        $content3 = new Content();
        $content3->setName("Test_Content_3");
        $content3->setPath("https://bitdash-a.akamaihd.net/content/MI201109210084_1/mpds/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.mpd");
        $content3->setOrdinance(3);
        $manager->persist($content3);

        $content4 = new Content();
        $content4->setName("Test_Content_4");
        $content4->setPath("https://bitdash-a.akamaihd.net/content/MI201109210084_1/mpds/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.mpd");
        $content4->setOrdinance(4);
        $manager->persist($content4);

        $content5 = new Content();
        $content5->setName("Test_Content_5");
        $content5->setPath("https://bitdash-a.akamaihd.net/content/MI201109210084_1/mpds/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.mpd");
        $content5->setOrdinance(5);
        $manager->persist($content5);

        $manager->flush();
    }
}