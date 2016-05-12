<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContentController extends Controller
{
    /**
     * @Route("/content", name="content")
     */

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
