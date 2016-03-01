<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller
{

    /**
     * @Route("/register")
     * @Template("AppBundle:register.html.twig")
     */
    public function indexAction()
    {
        return  array('nom'=>'test');
    }
}
