<?php

namespace App\Controller;

use App\Entity\PostCategory;
use App\Form\PostCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/new", name="category")
     */
    public function new(Request $request): Response
    {
        $category = new PostCategory();
        $form = $this->createForm(PostCategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $this->addFlash('Succès', 'Catégorie ajoutée');

            //éventuellement une redirection
        }


        return $this->render('category/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/category/{libelle}", name="category_libelle")
     */
    public function categoryLibelle($libelle): Response
    {
        $category = new PostCategory();
        $category->setTitle($libelle);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();


        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
