<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Teclado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Teclado controller.
 *
 * @Route("teclado")
 */
class TecladoController extends Controller
{
    /**
     * Lists all teclado entities.
     *
     * @Route("/", name="teclado_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teclados = $em->getRepository('AppBundle:Teclado')->findAll();

        return $this->render('teclado/index.html.twig', array(
            'teclados' => $teclados,
        ));
    }

    /**
     * Creates a new teclado entity.
     *
     * @Route("/new", name="teclado_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $teclado = new Teclado();
        $form = $this->createForm('AppBundle\Form\TecladoType', $teclado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($teclado);
            $em->flush();

            return $this->redirectToRoute('teclado_show', array('id' => $teclado->getId()));
        }

        return $this->render('teclado/new.html.twig', array(
            'teclado' => $teclado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a teclado entity.
     *
     * @Route("/{id}", name="teclado_show")
     * @Method("GET")
     */
    public function showAction(Teclado $teclado)
    {
        $deleteForm = $this->createDeleteForm($teclado);

        return $this->render('teclado/show.html.twig', array(
            'teclado' => $teclado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing teclado entity.
     *
     * @Route("/{id}/edit", name="teclado_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Teclado $teclado)
    {
        $deleteForm = $this->createDeleteForm($teclado);
        $editForm = $this->createForm('AppBundle\Form\TecladoType', $teclado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('teclado_edit', array('id' => $teclado->getId()));
        }

        return $this->render('teclado/edit.html.twig', array(
            'teclado' => $teclado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a teclado entity.
     *
     * @Route("/{id}", name="teclado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Teclado $teclado)
    {
        $form = $this->createDeleteForm($teclado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teclado);
            $em->flush();
        }

        return $this->redirectToRoute('teclado_index');
    }

    /**
     * Creates a form to delete a teclado entity.
     *
     * @param Teclado $teclado The teclado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Teclado $teclado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('teclado_delete', array('id' => $teclado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
