<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller
{
    /**
     * @Route("/aloja", name="plele")
     */
    public function indexAction(Request $request)
    {   
        $forma = new Usuario();
        $form = $this->createFormBuilder($forma)
        ->add('nombre',TextType::class)
        ->add('apellido',TextType::class)
        ->add('documento',TextType::class)
        ->add('save',SubmitType::class, array('label' => 'Guardar'))
        ->getForm();

        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {     
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }

        return $this->render('default/usuario.html.twig',array(
            'form' => $form->createView(),
        ));
    }
}
