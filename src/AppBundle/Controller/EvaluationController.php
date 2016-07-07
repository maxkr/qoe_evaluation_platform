<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvaluationController extends Controller
{
    /**
     * @Route("/evaluations", name="evaluation")
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

    public function evaluationAction(int $id, Request $request)
    {
        return $this->container;
    }
}
