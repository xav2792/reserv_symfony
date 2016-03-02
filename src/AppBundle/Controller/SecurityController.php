<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

use Symfony\Component\HttpFoundation\Request;



/**
 * @Route("/")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            //$em->persist($user);
            //$em->flush();
            //return $this->redirectToRoute('task_success');
        }

        return  array('form' => $form->createView());




    }

}
