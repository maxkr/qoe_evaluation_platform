<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class EvaluationController extends Controller
{
    /**
     * @Route("/evaluation", name="evaluation")
     */

    public function indexAction()
    {
        $user       =   $this->getUser();
        $evaluation =   $user->getEvaluation();
        $questions  =   $evaluation->getQuestions();

        var_dump($user->getUsername());
        echo "<br>";
        var_dump($evaluation->getName());
        echo "<br>";

        foreach ($questions as $question) {
            var_dump($question->getName());
            echo "<br>";
        }

        return $this->render('default/index.html.twig');
    }
}
