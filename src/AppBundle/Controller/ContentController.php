<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

        return $this->render('content/content.html.twig', array(
            'contents' => $contents
        ));
    }
}
