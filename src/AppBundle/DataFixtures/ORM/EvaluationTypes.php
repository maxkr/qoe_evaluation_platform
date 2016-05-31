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
use AppBundle\Entity\EvaluationType;


class EvaluationTypes implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $evaluationTypeACR = new EvaluationType();
        $evaluationTypeACR->setType("ACR");
        $manager->persist($evaluationTypeACR);

        $evaluationTypeACRHR = new EvaluationType();
        $evaluationTypeACRHR->setType("ACR-HR");
        $manager->persist($evaluationTypeACRHR);

        $evaluationTypeDCR = new EvaluationType();
        $evaluationTypeDCR->setType("DCR");
        $manager->persist($evaluationTypeDCR);

        $evaluationTypePC = new EvaluationType();
        $evaluationTypePC->setType("PC");
        $manager->persist($evaluationTypePC);

        $evaluationTypeDSIS = new EvaluationType();
        $evaluationTypeDSIS->setType("DSIS");
        $manager->persist($evaluationTypeDSIS);

        $evaluationTypeDSCQS = new EvaluationType();
        $evaluationTypeDSCQS->setType("DSCQS");
        $manager->persist($evaluationTypeDSCQS);

        $evaluationTypeSS = new EvaluationType();
        $evaluationTypeSS->setType("SS");
        $manager->persist($evaluationTypeSS);

        $manager->flush();
    }
}