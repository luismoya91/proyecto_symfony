<?php

namespace luis_symfonyBundle\Controller;

use luis_symfonyBundle\Entity\Empleado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Empleado controller.
 *
 */
class EmpleadoController extends Controller
{
    /**
     * Lists all empleado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('luis_symfonyBundle:Empleadorz')->findAll();

        return $this->render('empleado/index.html.twig', array(
            'empleados' => $empleados,
        ));
    }

    /**
     * Creates a new empleado entity.
     *
     */
    public function newAction(Request $request)
    {
        $empleado = new Empleado();
        $form = $this->createForm('luis_symfonyBundle\Form\EmpleadoType', $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleado_show', array('id' => $empleado->getId()));
        }

        return $this->render('empleado/new.html.twig', array(
            'empleado' => $empleado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empleado entity.
     *
     */
    public function showAction(Empleado $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);

        return $this->render('empleado/show.html.twig', array('empleado' => $empleado,'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing empleado entity.
     *
     */
    public function editAction(Request $request, Empleado $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);
        $editForm = $this->createForm('luis_symfonyBundle\Form\EmpleadoType', $empleado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empleado_edit', array('id' => $empleado->getId()));
        }

        return $this->render('empleado/edit.html.twig', array(
            'empleado' => $empleado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a empleado entity.
     *
     */
    public function deleteAction(Request $request, Empleado $empleado)
    {
        $form = $this->createDeleteForm($empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleado);
            $em->flush();
        }

        return $this->redirectToRoute('empleado_index');
    }

    /**
     * Creates a form to delete a empleado entity.
     *
     * @param Empleado $empleado The empleado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empleado $empleado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleado_delete', array('id' => $empleado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
