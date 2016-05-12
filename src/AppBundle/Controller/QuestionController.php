<?php
/**
 * Created by IntelliJ IDEA.
 * User: maximilian
 * Date: 16.03.16
 * Time: 13:13
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Question\EvaluationQuestionResult;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Question\Question;
use AppBundle\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class QuestionController extends Controller
{

    /**
     * @Route("/preQuestions", name="preQuestions")
     */

    public function renderPreQuestions(Request $request)
    {

        $preQuestionGroups = $this->getDoctrine()
            ->getRepository('AppBundle:Question\QuestionGroup')
            ->findByAppearanceOrderedByOrdinance("pre");

        $form = null;
        $form = $this->createForm(new QuestionType($preQuestionGroups));
        $form->add('save', SubmitType::class, array('label' => 'Submit'));

        $form->handleRequest($request);

        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $data = null;
                $data = $form->getData();
                $user = $this->get('security.token_storage')->getToken()->getUser();
                $em = $this->getDoctrine()->getManager();

//                /*var_dump($data);
//                echo "<br>";
//                echo "<br>";*/
                foreach($data as $key => $value)
                {
                    if(gettype($key) == "integer"){
                        $question = $em->getRepository("AppBundle:Question\Question")->findOneById($key);
                    }else {

                        $result = new EvaluationQuestionResult();
                        $result->setUser($user);

                        if (gettype($value) != "array") {
//                            echo "key: ";
//                            var_dump($key);
//                            echo "value: ";
//                            var_dump($value);
//                            echo "<br>";
                            $result->setResult(strval($value));
                        } else {
                            foreach ($value as $value_)

                                //                            echo "second_value: ";
                                //                            var_dump($value_);
                                //                            echo "<br>";
                                $result->setResult(strval($value_));
                        }
                        $result->setQuestion($question);
                        $em->persist($result);
                    }
                }
                $em->flush();
            }
        }
        return $this->render('questions/questionForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/postQuestions", name="postQuestions")
     */

    public function renderPostQuestions()
    {

        $postQuestionGroups = $this->getDoctrine()
            ->getRepository('AppBundle:Question\QuestionGroup')
            ->findByAppearanceOrderedByOrdinance("post");

        $form = $this->createForm(new QuestionType($postQuestionGroups));

        $form->add('save', SubmitType::class, array('label' => 'Submit'));

        return $this->render('questions/questionForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}


