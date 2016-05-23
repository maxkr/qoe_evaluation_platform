<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StoreMetricsController extends Controller
{
    /**
     * @Route("/storeMetrics", name="storeMetrics")
     */

    public function indexAction()
    {
        return $this->render('content/content.html.twig');
    }
}
