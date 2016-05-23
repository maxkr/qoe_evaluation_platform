<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class StoreMetricsController extends Controller
{
    /**
     * @Route("/storeMetrics", name="storeMetrics")
     */

    public function indexAction()
    {
        return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }
}
