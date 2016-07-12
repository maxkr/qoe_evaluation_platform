<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 16.03.16
 * Time: 13:13
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Question\EvaluationQuestionResult;
use AppBundle\Entity\Question\Question;
use AppBundle\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class QuestionController extends Controller
{

    /**
     * @Route("/evaluation/{id}/preQuestions", name="preQuestions")
     */

    public function renderPreQuestions($id, Request $request)
    {


        $evaluation = $this->getDoctrine()
            ->getRepository("AppBundle:Evaluation")->findOneById($id);

        $questions = $evaluation->getQuestions();

        foreach ($questions as $question){
            if($question->getAppearance() != "pre"){
                $questions->removeElement($question);
            }
        }

        $form = null;
        $form = $this->createForm(new QuestionType($questions));
        $form->add('save', SubmitType::class, array('label' => 'Submit'));

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $data = null;
                $data = $form->getData();
                $user = $this->getUser();

                $em = $this->getDoctrine()->getManager();

                foreach ($data as $key => $value) {

                    $result = new EvaluationQuestionResult();

                    if (is_int($key)) {
                        $question = $this->getDoctrine()
                            ->getRepository("AppBundle:Question\Question")
                            ->findOneById($key);
                    } elseif (is_string($key)) {
                        if (is_array($value)) {
                            foreach ($value as $k => $a) {
                                $answer = $this->getDoctrine()
                                    ->getRepository("AppBundle:Question\Answer")
                                    ->findOneById($a);
                                $result->addAnswer($answer);
                            }
                        }elseif (is_int($value)){
                        $answer = $this->getDoctrine()
                            ->getRepository("AppBundle:Question\Answer")
                            ->findOneById($value);
                        $result->addAnswer($answer);
                        }
                        $result->setEvaluation($evaluation);
                        $result->setUser($user);
                        $result->setQuestion($question);
                        if ($question->getType() == "text" or
                            $question->getType() == "textArea" or
                            $question->getType() == "slider") {
                            $result->setTextanswer($value);
                        }
                        $result->setComment(null);
                        $em->persist($result);
                    }
                }
                $em->flush();

                return $this->render('content/content.html.twig', array(
                    'evaluation' => $evaluation
                ));
            }
        }
        return $this->render('questions/questionForm.html.twig', array(
            'form' => $form->createView(),
            'questions' => $questions
        ));
    }


    /**
     * @Route("/evaluation/{id}/postQuestions", name="postQuestions")
     */

    public function renderPostQuestions($id, Request $request)
    {

        $evaluation = $this->getDoctrine()
            ->getRepository("AppBundle:Evaluation")->findOneById($id);

        $questions = $evaluation->getQuestions();

        foreach ($questions as $question){
            if($question->getAppearance() != "post"){
                $questions->removeElement($question);
            }
        }

        $form = null;
        $form = $this->createForm(new QuestionType($questions));
        $form->add('save', SubmitType::class, array('label' => 'Submit'));

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $data = null;
                $data = $form->getData();
                $user = $this->getUser();

                $em = $this->getDoctrine()->getManager();

                foreach ($data as $key => $value) {

                    $result = new EvaluationQuestionResult();

                    if (is_int($key)) {
                        $question = $this->getDoctrine()
                            ->getRepository("AppBundle:Question\Question")
                            ->findOneById($key);
                    } elseif (is_string($key)) {
                        if (is_array($value)) {
                            foreach ($value as $k => $a) {
                                $answer = $this->getDoctrine()
                                    ->getRepository("AppBundle:Question\Answer")
                                    ->findOneById($a);
                                $result->addAnswer($answer);
                            }
                        }elseif (is_int($value)){
                            $answer = $this->getDoctrine()
                                ->getRepository("AppBundle:Question\Answer")
                                ->findOneById($value);
                            $result->addAnswer($answer);
                        }
                        $result->setEvaluation($evaluation);
                        $result->setUser($user);
                        $result->setQuestion($question);
                        if ($question->getType() == "text" or $question->getType() == "textArea") {
                            $result->setTextanswer($value);
                        }
                        $result->setComment(null);
                        $em->persist($result);
                    }
                }

                $em->flush();
                return $this->render('questions/questionForm.html.twig', array(
                    'data' => $data
                ));
            }
        }
        return $this->render('questions/questionForm.html.twig', array(
            'form' => $form->createView(),
            'questions' => $questions
        ));
    }

}


