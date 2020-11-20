<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\PostCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        $postCategory = $this->getDoctrine()->getRepository(PostCategory::class)->find(1);

        $post = new Post();
        $post->setTitle('Post 3');
        $post->setContent('Loreum ipsum...');
        $post->setCategory($postCategory); //affecte une catégorieà mon post

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/affiche-all", name="affiche_all")
     */
    public function afficheAll(): Response
    {
        //récupération du post à l'ID 1
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        $categories = $this->getDoctrine()->getRepository(PostCategory::class)->findAll();


        return $this->render('post/afficheAll.html.twig', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/affiche", name="affiche")
     */
    public function affiche(): Response
    {
        //récupération du post à l'ID 1
       $post = $this->getDoctrine()->getRepository(Post::class)->find(1);
       //récupération de la catégorie à l'ID 1
       $category = $this->getDoctrine()->getRepository(PostCategory::class)->find(1);

        return $this->render('post/affiche.html.twig', [
            'post' => $post,
            'category' => $category
        ]);
    }
}
