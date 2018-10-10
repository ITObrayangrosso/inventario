<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Monitor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Monitor controller.
 *
 * @Route("monitor")
 */
class MonitorController extends Controller
{
    /**
     * Lists all monitor entities.
     *
     * @Route("/", name="monitor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $monitors = $em->getRepository('AppBundle:Monitor')->findAll();

        return $this->render('monitor/index.html.twig', array(
            'monitors' => $monitors,
        ));
    }

    /**
     * Creates a new monitor entity.
     *
     * @Route("/new", name="monitor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $monitor = new Monitor();
        $form = $this->createForm('AppBundle\Form\MonitorType', $monitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($monitor);
            $em->flush();

            return $this->redirectToRoute('monitor_show', array('id' => $monitor->getId()));
        }

        return $this->render('monitor/new.html.twig', array(
            'monitor' => $monitor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a monitor entity.
     *
     * @Route("/{id}", name="monitor_show")
     * @Method("GET")
     */
    public function showAction(Monitor $monitor)
    {
        $deleteForm = $this->createDeleteForm($monitor);

        return $this->render('monitor/show.html.twig', array(
            'monitor' => $monitor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing monitor entity.
     *
     * @Route("/{id}/edit", name="monitor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Monitor $monitor)
    {
        $deleteForm = $this->createDeleteForm($monitor);
        $editForm = $this->createForm('AppBundle\Form\MonitorType', $monitor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('monitor_edit', array('id' => $monitor->getId()));
        }

        return $this->render('monitor/edit.html.twig', array(
            'monitor' => $monitor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a monitor entity.
     *
     * @Route("/{id}", name="monitor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Monitor $monitor)
    {
        $form = $this->createDeleteForm($monitor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($monitor);
            $em->flush();
        }

        return $this->redirectToRoute('monitor_index');
    }

    /**
     * Creates a form to delete a monitor entity.
     *
     * @param Monitor $monitor The monitor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Monitor $monitor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('monitor_delete', array('id' => $monitor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
