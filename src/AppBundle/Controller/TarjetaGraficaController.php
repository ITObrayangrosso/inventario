<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TarjetaGrafica;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tarjetagrafica controller.
 *
 * @Route("tarjetagrafica")
 */
class TarjetaGraficaController extends Controller
{
    /**
     * Lists all tarjetaGrafica entities.
     *
     * @Route("/", name="tarjetagrafica_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tarjetaGraficas = $em->getRepository('AppBundle:TarjetaGrafica')->findAll();

        return $this->render('tarjetagrafica/index.html.twig', array(
            'tarjetaGraficas' => $tarjetaGraficas,
        ));
    }

    /**
     * Creates a new tarjetaGrafica entity.
     *
     * @Route("/new", name="tarjetagrafica_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarjetaGrafica = new Tarjetagrafica();
        $form = $this->createForm('AppBundle\Form\TarjetaGraficaType', $tarjetaGrafica);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarjetaGrafica);
            $em->flush();

            return $this->redirectToRoute('tarjetagrafica_show', array('id' => $tarjetaGrafica->getId()));
        }

        return $this->render('tarjetagrafica/new.html.twig', array(
            'tarjetaGrafica' => $tarjetaGrafica,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tarjetaGrafica entity.
     *
     * @Route("/{id}", name="tarjetagrafica_show")
     * @Method("GET")
     */
    public function showAction(TarjetaGrafica $tarjetaGrafica)
    {
        $deleteForm = $this->createDeleteForm($tarjetaGrafica);

        return $this->render('tarjetagrafica/show.html.twig', array(
            'tarjetaGrafica' => $tarjetaGrafica,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tarjetaGrafica entity.
     *
     * @Route("/{id}/edit", name="tarjetagrafica_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TarjetaGrafica $tarjetaGrafica)
    {
        $deleteForm = $this->createDeleteForm($tarjetaGrafica);
        $editForm = $this->createForm('AppBundle\Form\TarjetaGraficaType', $tarjetaGrafica);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarjetagrafica_edit', array('id' => $tarjetaGrafica->getId()));
        }

        return $this->render('tarjetagrafica/edit.html.twig', array(
            'tarjetaGrafica' => $tarjetaGrafica,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tarjetaGrafica entity.
     *
     * @Route("/{id}", name="tarjetagrafica_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TarjetaGrafica $tarjetaGrafica)
    {
        $form = $this->createDeleteForm($tarjetaGrafica);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarjetaGrafica);
            $em->flush();
        }

        return $this->redirectToRoute('tarjetagrafica_index');
    }

    /**
     * Creates a form to delete a tarjetaGrafica entity.
     *
     * @param TarjetaGrafica $tarjetaGrafica The tarjetaGrafica entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TarjetaGrafica $tarjetaGrafica)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarjetagrafica_delete', array('id' => $tarjetaGrafica->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
