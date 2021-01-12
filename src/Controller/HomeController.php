<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Post::class)->findAll();
        return $this->render('home/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug)
    {
        return new Response('hello : ' . $slug);
    }
}