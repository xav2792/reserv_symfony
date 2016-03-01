<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function loginAction()
    {

        return  array();

    }

}
