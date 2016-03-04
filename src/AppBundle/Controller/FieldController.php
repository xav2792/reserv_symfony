<?php

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Field;
use AppBundle\Form\FieldType;

/**
 * Field controller.
 *
 * @Route("/field")
 */
class FieldController extends Controller
{
    /**
     * Lists all Field entities.
     *
     * @Route("/", name="field_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fields = $em->getRepository('AppBundle:Field')->findAll();

        return $this->render('field/index.html.twig', array(
            'fields' => $fields,
        ));
    }

    /**
     * Creates a new Field entity.
     *
     * @Route("/new", name="field_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $field = new Field();
            $form = $this->createForm('AppBundle\Form\FieldType', $field);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($field);
                $em->flush();

                return $this->redirectToRoute('field_show', array('id' => $field->getId()));
            }

            return $this->render('field/new.html.twig', array(
                'field' => $field,
                'form' => $form->createView(),
            ));
        } else {
            return $this->render('field/error.html.twig');
        }
    }

    /**
     * Finds and displays a Field entity.
     *
     * @Route("/{id}", name="field_show")
     * @Method("GET")
     */
    public function showAction(Field $field)
    {
        $deleteForm = $this->createDeleteForm($field);

        return $this->render('field/show.html.twig', array(
            'field' => $field,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Field entity.
     *
     * @Route("/{id}/edit", name="field_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Field $field)
    {
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $deleteForm = $this->createDeleteForm($field);
            $editForm = $this->createForm('AppBundle\Form\FieldType', $field);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($field);
                $em->flush();

                return $this->redirectToRoute('field_edit', array('id' => $field->getId()));
            }

            return $this->render('field/edit.html.twig', array(
                'field' => $field,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        } else {
            return $this->render('field/error.html.twig');
        }
    }

    /**
     * Deletes a Field entity.
     *
     * @Route("/{id}", name="field_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Field $field)
    {
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $form = $this->createDeleteForm($field);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($field);
                $em->flush();
            }

            return $this->redirectToRoute('field_index');
        } else {
            return $this->render('field/error.html.twig');
        }
    }

    /**
     * Creates a form to delete a Field entity.
     *
     * @param Field $field The Field entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Field $field)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('field_delete', array('id' => $field->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
