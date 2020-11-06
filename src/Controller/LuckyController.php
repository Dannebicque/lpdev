<?php

namespace App\Controller;


use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number", name="lucky_number")
     */
    public function number(){
        $number = mt_rand(0,100);
        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }

    /**
     * @Route("/lucky/date", name="lucky_date")
     */
    public function date(Request $request)
    {
        $date = new \DateTime('now');

        return $this->render('lucky/date.html.twig', ['date' => $date->format('d/m/Y')]);
    }

    /**
     * @Route("/lucky/couleur/{color}", name="lucky_couleur")
     */
    public function couleur(string $color)
    {
        return $this->render('lucky/color.html.twig', ['color' => $color]);
    }

    /**
     * @Route("/lucky/choix-couleur", name="lucky_choix_couleur")
     */
    public function choixCouleur(

    )
    {

        $tabCouleur = [
            'red',
            'blue',
            'yellow',
            'pink',
            'violet',
            'salmon'
        ];

        return $this->render('lucky/choixColor.html.twig', [
            'tabCouleur' => $tabCouleur]);
    }
}
