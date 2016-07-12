<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvaluationController extends Controller
{
    /**
     * @Route("/evaluation", name="evaluationIndex")
     */

    public function indexAction()
    {
        $user       =   $this->getUser();
        $evaluations = $user->getEvaluations();

        return $this->render('default/index.html.twig', array(
            'user'          => $user,
            'evaluations'   => $evaluations
        ));
    }

    /**
     * @Route("/evaluation/{id}/intro", name="evaluationIntro")
     */

    public function evaluationIntroAction($id, Request $request)
    {
        $evaluation = $this->getDoctrine()->getRepository("AppBundle:Evaluation")->findOneById($id);

        return $this->render('evaluation/evaluation_intro.html.twig', array(
            'evaluation'    =>  $evaluation
        ));
    }

    /**
     * @Route("/evaluation/{id}/disclaimer", name="evaluationDisclaimer")
     */

    public function evaluationDisclaimerAction($id, Request $request)
    {
        $evaluation = $this->getDoctrine()->getRepository("AppBundle:Evaluation")->findOneById($id);

        return $this->render('evaluation/evaluation_disclaimer.html.twig', array(
            'evaluation'    =>  $evaluation
        ));
    }
}
