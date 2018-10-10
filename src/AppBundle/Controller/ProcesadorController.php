<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Procesador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Procesador controller.
 *
 * @Route("procesador")
 */
class ProcesadorController extends Controller
{
    /**
     * Lists all procesador entities.
     *
     * @Route("/", name="procesador_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $procesadors = $em->getRepository('AppBundle:Procesador')->findAll();

        return $this->render('procesador/index.html.twig', array(
            'procesadors' => $procesadors,
        ));
    }

    /**
     * Creates a new procesador entity.
     *
     * @Route("/new", name="procesador_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $procesador = new Procesador();
        $form = $this->createForm('AppBundle\Form\ProcesadorType', $procesador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($procesador);
            $em->flush();

            return $this->redirectToRoute('procesador_show', array('id' => $procesador->getId()));
        }

        return $this->render('procesador/new.html.twig', array(
            'procesador' => $procesador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a procesador entity.
     *
     * @Route("/{id}", name="procesador_show")
     * @Method("GET")
     */
    public function showAction(Procesador $procesador)
    {
        $deleteForm = $this->createDeleteForm($procesador);

        return $this->render('procesador/show.html.twig', array(
            'procesador' => $procesador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing procesador entity.
     *
     * @Route("/{id}/edit", name="procesador_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Procesador $procesador)
    {
        $deleteForm = $this->createDeleteForm($procesador);
        $editForm = $this->createForm('AppBundle\Form\ProcesadorType', $procesador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('procesador_edit', array('id' => $procesador->getId()));
        }

        return $this->render('procesador/edit.html.twig', array(
            'procesador' => $procesador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a procesador entity.
     *
     * @Route("/{id}", name="procesador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Procesador $procesador)
    {
        $form = $this->createDeleteForm($procesador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($procesador);
            $em->flush();
        }

        return $this->redirectToRoute('procesador_index');
    }

    /**
     * Creates a form to delete a procesador entity.
     *
     * @param Procesador $procesador The procesador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Procesador $procesador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('procesador_delete', array('id' => $procesador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
