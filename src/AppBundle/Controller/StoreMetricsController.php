<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class StoreMetricsController extends Controller
{
    /**
     * @Route("/evaluation/storeMetrics", name="storeMetrics")
     */

    public function storeMetricsAction()
    {
        return $this->redirectToRoute('evaluationIndex');
    }
}
