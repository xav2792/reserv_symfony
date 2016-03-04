<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Reservation;
use AppBundle\Form\ReservationType;

/**
 * Reservation controller.
 *
 * @Route("/reservation")
 */
class ReservationController extends Controller
{
    /**
     * Lists all Reservation entities.
     *
     * @Route("/", name="reservation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
            $em = $this->getDoctrine()->getManager();

            $reservations = $em->getRepository('AppBundle:Reservation')->findByUser($this->getUser());

            return $this->render('reservation/index.html.twig', array(
                'reservations' => $reservations,
            ));


    }

    /**
     * Lists all Reservation entities.
     *
     * @Route("/all", name="reservation_all")
     * @Method("GET")
     */
    public function allAction()
    {
            $em = $this->getDoctrine()->getManager();

            $reservations = $em->getRepository('AppBundle:Reservation')->findAll();

            return $this->render('reservation/index.html.twig', array(
                'reservations' => $reservations,
            ));


    }

    /**
     * Creates a new Reservation entity.
     *
     * @Route("/new", name="reservation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
            $reservation = new Reservation();
            $form = $this->createForm('AppBundle\Form\ReservationType', $reservation);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $reservationManager = $this->get('app.reservation.manager');

                if($reservationManager->createReservation($reservation, $this->getUser())) {
                   // $this->get('app.mailer')->sendMail($this->getUser()->getEmail());
                    return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
                } else {
                    return $this->render('reservation/error.html.twig');
                }
            }

            return $this->render('reservation/new.html.twig', array(
                'reservation' => $reservation,
                'form' => $form->createView(),
            ));
    }

    /**
     * Finds and displays a Reservation entity.
     *
     * @Route("/{id}", name="reservation_show")
     * @Method("GET")
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     * @Route("/{id}/edit", name="reservation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        if($this->getUser() == $reservation->getUser() || $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $deleteForm = $this->createDeleteForm($reservation);
            $editForm = $this->createForm('AppBundle\Form\ReservationType', $reservation);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($reservation);
                $em->flush();

                return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
            }

            return $this->render('reservation/edit.html.twig', array(
                'reservation' => $reservation,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }else{
            return $this->render('field/error.html.twig');
        }
    }

    /**
     * Deletes a Reservation entity.
     *
     * @Route("/{id}", name="reservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        if($this->getUser() == $reservation->getUser() || $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $form = $this->createDeleteForm($reservation);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($reservation);
                $em->flush();
            }

            return $this->redirectToRoute('reservation_index');
        }else{
            return $this->render('field/error.html.twig');
        }

    }

    /**
     * Creates a form to delete a Reservation entity.
     *
     * @param Reservation $reservation The Reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
