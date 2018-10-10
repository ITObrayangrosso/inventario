<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mouse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mouse controller.
 *
 * @Route("mouse")
 */
class MouseController extends Controller
{
    /**
     * Lists all mouse entities.
     *
     * @Route("/", name="mouse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mice = $em->getRepository('AppBundle:Mouse')->findAll();

        return $this->render('mouse/index.html.twig', array(
            'mice' => $mice,
        ));
    }

    /**
     * Creates a new mouse entity.
     *
     * @Route("/new", name="mouse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mouse = new Mouse();
        $form = $this->createForm('AppBundle\Form\MouseType', $mouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mouse);
            $em->flush();

            return $this->redirectToRoute('mouse_show', array('id' => $mouse->getId()));
        }

        return $this->render('mouse/new.html.twig', array(
            'mouse' => $mouse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mouse entity.
     *
     * @Route("/{id}", name="mouse_show")
     * @Method("GET")
     */
    public function showAction(Mouse $mouse)
    {
        $deleteForm = $this->createDeleteForm($mouse);

        return $this->render('mouse/show.html.twig', array(
            'mouse' => $mouse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mouse entity.
     *
     * @Route("/{id}/edit", name="mouse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mouse $mouse)
    {
        $deleteForm = $this->createDeleteForm($mouse);
        $editForm = $this->createForm('AppBundle\Form\MouseType', $mouse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mouse_edit', array('id' => $mouse->getId()));
        }

        return $this->render('mouse/edit.html.twig', array(
            'mouse' => $mouse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mouse entity.
     *
     * @Route("/{id}", name="mouse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mouse $mouse)
    {
        $form = $this->createDeleteForm($mouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mouse);
            $em->flush();
        }

        return $this->redirectToRoute('mouse_index');
    }

    /**
     * Creates a form to delete a mouse entity.
     *
     * @param Mouse $mouse The mouse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mouse $mouse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mouse_delete', array('id' => $mouse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
