<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MemoriaRam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Memoriaram controller.
 *
 * @Route("memoriaram")
 */
class MemoriaRamController extends Controller
{
    /**
     * Lists all memoriaRam entities.
     *
     * @Route("/", name="memoriaram_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memoriaRams = $em->getRepository('AppBundle:MemoriaRam')->findAll();

        return $this->render('memoriaram/index.html.twig', array(
            'memoriaRams' => $memoriaRams,
        ));
    }

    /**
     * Creates a new memoriaRam entity.
     *
     * @Route("/new", name="memoriaram_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $memoriaRam = new Memoriaram();
        $form = $this->createForm('AppBundle\Form\MemoriaRamType', $memoriaRam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($memoriaRam);
            $em->flush();

            return $this->redirectToRoute('memoriaram_show', array('id' => $memoriaRam->getId()));
        }

        return $this->render('memoriaram/new.html.twig', array(
            'memoriaRam' => $memoriaRam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memoriaRam entity.
     *
     * @Route("/{id}", name="memoriaram_show")
     * @Method("GET")
     */
    public function showAction(MemoriaRam $memoriaRam)
    {
        $deleteForm = $this->createDeleteForm($memoriaRam);

        return $this->render('memoriaram/show.html.twig', array(
            'memoriaRam' => $memoriaRam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memoriaRam entity.
     *
     * @Route("/{id}/edit", name="memoriaram_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MemoriaRam $memoriaRam)
    {
        $deleteForm = $this->createDeleteForm($memoriaRam);
        $editForm = $this->createForm('AppBundle\Form\MemoriaRamType', $memoriaRam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('memoriaram_edit', array('id' => $memoriaRam->getId()));
        }

        return $this->render('memoriaram/edit.html.twig', array(
            'memoriaRam' => $memoriaRam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a memoriaRam entity.
     *
     * @Route("/{id}", name="memoriaram_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MemoriaRam $memoriaRam)
    {
        $form = $this->createDeleteForm($memoriaRam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memoriaRam);
            $em->flush();
        }

        return $this->redirectToRoute('memoriaram_index');
    }

    /**
     * Creates a form to delete a memoriaRam entity.
     *
     * @param MemoriaRam $memoriaRam The memoriaRam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MemoriaRam $memoriaRam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memoriaram_delete', array('id' => $memoriaRam->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
