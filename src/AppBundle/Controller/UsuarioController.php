<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuarioController extends Controller
{
    /**
     * @Route("/registrar/usuario", name="homepage")
     */
    public function indexAction(Request $request)
    {   
        $styleinputs = array('attr' => array('class' => 'form-control'));
        $forma = new Usuario();
        $form = $this->createFormBuilder($forma)
        ->add('nombre',TextType::class,$styleinputs)
        ->add('apellido',TextType::class,$styleinputs)
        ->add('documento',TextType::class,$styleinputs)
        ->add('save',SubmitType::class, array('label' => 'Guardar','attr' => array('class' => 'btn-primary')))
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
