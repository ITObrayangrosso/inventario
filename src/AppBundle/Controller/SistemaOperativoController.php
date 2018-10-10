<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SistemaOperativo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sistemaoperativo controller.
 *
 * @Route("sistemaoperativo")
 */
class SistemaOperativoController extends Controller
{
    /**
     * Lists all sistemaOperativo entities.
     *
     * @Route("/", name="sistemaoperativo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sistemaOperativos = $em->getRepository('AppBundle:SistemaOperativo')->findAll();

        return $this->render('sistemaoperativo/index.html.twig', array(
            'sistemaOperativos' => $sistemaOperativos,
        ));
    }

    /**
     * Creates a new sistemaOperativo entity.
     *
     * @Route("/new", name="sistemaoperativo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sistemaOperativo = new Sistemaoperativo();
        $form = $this->createForm('AppBundle\Form\SistemaOperativoType', $sistemaOperativo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sistemaOperativo);
            $em->flush();

            return $this->redirectToRoute('sistemaoperativo_show', array('id' => $sistemaOperativo->getId()));
        }

        return $this->render('sistemaoperativo/new.html.twig', array(
            'sistemaOperativo' => $sistemaOperativo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sistemaOperativo entity.
     *
     * @Route("/{id}", name="sistemaoperativo_show")
     * @Method("GET")
     */
    public function showAction(SistemaOperativo $sistemaOperativo)
    {
        $deleteForm = $this->createDeleteForm($sistemaOperativo);

        return $this->render('sistemaoperativo/show.html.twig', array(
            'sistemaOperativo' => $sistemaOperativo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sistemaOperativo entity.
     *
     * @Route("/{id}/edit", name="sistemaoperativo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SistemaOperativo $sistemaOperativo)
    {
        $deleteForm = $this->createDeleteForm($sistemaOperativo);
        $editForm = $this->createForm('AppBundle\Form\SistemaOperativoType', $sistemaOperativo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sistemaoperativo_edit', array('id' => $sistemaOperativo->getId()));
        }

        return $this->render('sistemaoperativo/edit.html.twig', array(
            'sistemaOperativo' => $sistemaOperativo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sistemaOperativo entity.
     *
     * @Route("/{id}", name="sistemaoperativo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SistemaOperativo $sistemaOperativo)
    {
        $form = $this->createDeleteForm($sistemaOperativo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sistemaOperativo);
            $em->flush();
        }

        return $this->redirectToRoute('sistemaoperativo_index');
    }

    /**
     * Creates a form to delete a sistemaOperativo entity.
     *
     * @param SistemaOperativo $sistemaOperativo The sistemaOperativo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SistemaOperativo $sistemaOperativo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sistemaoperativo_delete', array('id' => $sistemaOperativo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
