<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 31.05.16
 * Time: 16:06
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Question\QuestionType;


class QuestionTypes implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $questionTypeText = new QuestionType();
        $questionTypeText->setType("text");
        $manager->persist($questionTypeText);

        $questionTypeTextArea = new QuestionType();
        $questionTypeTextArea->setType("textArea");
        $manager->persist($questionTypeTextArea);

        $questionTypeRadioBox = new QuestionType();
        $questionTypeRadioBox->setType("radioBox");
        $manager->persist($questionTypeRadioBox);

        $questionTypeSelectionBox = new QuestionType();
        $questionTypeSelectionBox->setType("selectionBox");
        $manager->persist($questionTypeSelectionBox);

        $questionTypeCheckBox = new QuestionType();
        $questionTypeCheckBox->setType("checkBox");
        $manager->persist($questionTypeCheckBox);

        $questionTypeCountry = new QuestionType();
        $questionTypeCountry->setType("country");
        $manager->persist($questionTypeCountry);

        $questionTypeBirthday = new QuestionType();
        $questionTypeBirthday->setType("birthday");
        $manager->persist($questionTypeBirthday);

        $questionTypeSlider = new QuestionType();
        $questionTypeSlider->setType("slider");
        $manager->persist($questionTypeSlider);

        $manager->flush();
    }
}