<?php

namespace luis_symfonyBundle\Controller;

use luis_symfonyBundle\Entity\Empleador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Empleador controller.
 *
 */
class EmpleadorController extends Controller
{
    /**
     * Lists all empleador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleadors = $em->getRepository('luis_symfonyBundle:Empleador')->findAll();

        return $this->render('empleador/index.html.twig', array(
            'empleadors' => $empleadors,
        ));
    }

    /**
     * Creates a new empleador entity.
     *
     */
    public function newAction(Request $request)
    {
        $empleador = new Empleador();
        $form = $this->createForm('luis_symfonyBundle\Form\EmpleadorType', $empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleador);
            $em->flush();

            return $this->redirectToRoute('empleador_show', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/new.html.twig', array(
            'empleador' => $empleador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empleador entity.
     *
     */
    public function showAction(Empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);

        return $this->render('empleador/show.html.twig', array(
            'empleador' => $empleador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empleador entity.
     *
     */
    public function editAction(Request $request, Empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);
        $editForm = $this->createForm('luis_symfonyBundle\Form\EmpleadorType', $empleador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empleador_edit', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/edit.html.twig', array(
            'empleador' => $empleador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a empleador entity.
     *
     */
    public function deleteAction(Request $request, Empleador $empleador)
    {
        $form = $this->createDeleteForm($empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleador);
            $em->flush();
        }

        return $this->redirectToRoute('empleador_index');
    }

    /**
     * Creates a form to delete a empleador entity.
     *
     * @param Empleador $empleador The empleador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empleador $empleador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleador_delete', array('id' => $empleador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
