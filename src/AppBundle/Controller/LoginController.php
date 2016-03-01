<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LoginController extends Controller
{

    /**
     * @Route("/")
     * @Template("BlogBundle:Default:base.html.twig")
     */
    public function indexAction()
    {
        return  array('nom'=>'test');
    }
}
