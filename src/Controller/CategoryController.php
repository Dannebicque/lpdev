<?php

namespace App\Controller;

use App\Entity\PostCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(): Response
    {
        $category = new PostCategory();
        $category->setTitle('Catégorie 1');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();


        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
