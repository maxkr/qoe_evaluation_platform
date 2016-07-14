<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EvaluationContentResult;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class StoreMetricsController extends Controller
{
    /**
     * @Route("/evaluation/storeMetrics", name="storeMetrics")
     */

    public function storeMetricsAction(Request $request)
    {
        $contents = $request->getContent();

       /* if(!empty($contents)) {
            $params = json_decode($contents, true);
        }*/


        $em = $this->getDoctrine()->getManager();

        $result = new EvaluationContentResult();
        $result->setName($contents);

        $em->persist($result);


        $em->flush();

        return new Response("Hello");

//        return $this->redirectToRoute('evaluationIndex');
    }
}
