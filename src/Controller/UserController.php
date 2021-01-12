<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserController extends AbstractController
{
    /**
     * @Route("/user/login", name="user_login")
     */
    public function login()
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Login'])
            ->getForm();

        return $this->render('user/login.html.twig', [
            'form' => $form->createView()
        ]);
    }
}