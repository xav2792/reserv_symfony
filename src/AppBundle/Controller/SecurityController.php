<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use AppBundle\Form\LoginType;

use Symfony\Component\HttpFoundation\Request;



/**
 * @Route("/")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(LoginType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->get('session')->getFlashBag()->add('success', 'Your proposition hasbeen saved!');
            return $this->redirect($this->generateUrl('field_index'));

           // $em = $this->getDoctrine()->getManager();
            //$em->persist($user);
            //$em->flush();
            //return $this->redirectToRoute('task_success');
        }

        return  array('form' => $form->createView());




    }

}
