<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * Lists all Field entities.
     *
     * @Route("/")
     * @Template("AppBundle:base.html.twig")
     */
    public function indexAction()
    {

    }
}
