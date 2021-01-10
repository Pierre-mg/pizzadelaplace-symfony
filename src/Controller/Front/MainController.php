<?php

namespace App\Controller\Front;

use App\Repository\WineRepository;
use App\Repository\DrinkRepository;
use App\Repository\SectionRepository;
use App\Repository\InformationRepository;
use App\Repository\DessertPizzaRepository;
use App\Repository\AllergenProductRepository;
use App\Repository\PizzaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
    * @Route("/", name="home")
    */
    public function index(SectionRepository $section, PizzaRepository $pizza, DessertPizzaRepository $dessertPizza, DrinkRepository $drink, WineRepository $wine, AllergenProductRepository $allergenProduct, InformationRepository $information): Response
    {
        return $this->render('front/index.html.twig', [
            'section' => $section->findAll(),
            'redPizza' => $pizza->findBySectionId(1),
            'whitePizza' => $pizza->findBySectionId(2),
            'specialRed' => $pizza->findBySectionId(3),
            'specialWhite' => $pizza->findBySectionId(4),
            'dessertPizza' => $dessertPizza->findAll(),
            'drinks' => $drink->findAll(),
            'wines' => $wine->findAll(),
            'allergenProduct' => $allergenProduct->findAll(),
            'information' => $information->findAll()]);
    }

    /**
    * @Route("/legal-mentions", name="legal-mentions")
    */
    public function legalMention(): Response
    {
        return $this->render('front/legal_mentions.html.twig');
    }


}
