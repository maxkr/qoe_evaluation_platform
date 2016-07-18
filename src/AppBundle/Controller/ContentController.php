<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EvaluationContentResult;
use AppBundle\Form\EvaluationContentResultType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    /**
     * @Route("/evaluation/{id}/content", name="content")
     */

    public function indexAction($id)
    {
        $evaluation = $this->getDoctrine()
            ->getRepository("AppBundle:Evaluation")
            ->findOneById($id);
        $contents   = $evaluation->getContents();

        $result = new EvaluationContentResult();

        $result_a = $result->toArray();

        $form = null;
        $form = $this->createForm(new EvaluationContentResultType($result_a));


        return $this->render('content/content.html.twig', array(
            'contents'      => $contents,
            'evaluation'    => $evaluation,
            'form'          => $form->createView(),
            'result'        => $result_a
        ));
    }

    /**
     * @Route("/evaluation/{evalId}/content/{contentId}", name="storeContent")
     */

    public function storeAction($evalId, $contentId, Request $request)
    {

        $evaluation = $this->getDoctrine()
            ->getRepository("AppBundle:Evaluation")
            ->findOneById($evalId);
        $content   = $this->getDoctrine()
            ->getRepository('AppBundle:Content')
            ->findOneById($contentId);

        $result = new EvaluationContentResult();

        if ($request->isXmlHttpRequest()) {

            $data = null;
            $data = $request->getContent();
            $user = $this->getUser();

            $params = json_decode($data, true);

            $em = $this->getDoctrine()->getManager();

            $result->setUser($user);
            $result->setEvaluation($evaluation);
            $result->setContent($content);

            $result->setBfchange($params["bfchange"]);
            $result->setFingerprint($params["fingerprint"]);
            $result->setFullscreen($params["fullscreen"]);
            $result->setBuffer($params["buffer"]);
            $result->setGuessedBw($params["guessedBw"]);
            $result->setRepresentationBitrate($params["representationBitrate"]);
            $result->setPauses($params["pauses"]);
            $result->setStalls($params["stalls"]);
            $result->setStartupTime($params["startupTime"]);
            $result->setVideoTimes($params["videoTimes"]);
            $result->setPlayerType($params["playerType"]);
            $result->setUserRating($params["userRating"]);

            $em->persist($result);
            $em->flush();

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($data);

            return $response;

        }
    }
}
