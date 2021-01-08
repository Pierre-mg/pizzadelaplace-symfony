<?php

namespace App\Controller;

use App\Repository\WineRepository;
use App\Repository\DrinkRepository;
use App\Repository\SectionRepository;
use App\Repository\RedPizzaRepository;
use App\Repository\SpecialRedRepository;
use App\Repository\WhitePizzaRepository;
use App\Repository\InformationRepository;
use App\Repository\DessertPizzaRepository;
use App\Repository\SpecialWhiteRepository;
use App\Repository\AllergenProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
    * @Route("/", name="home")
    */
    public function index(SectionRepository $section, RedPizzaRepository $redPizza, WhitePizzaRepository $whitePizza, SpecialRedRepository $specialRed, SpecialWhiteRepository $specialWhite,
    DessertPizzaRepository $dessertPizza, DrinkRepository $drink, WineRepository $wine, AllergenProductRepository $allergenProduct, InformationRepository $information): Response
    {
        return $this->render('main/index.html.twig', [
            'section' => $section->findAll(),
            'redPizza' => $redPizza->findAll(),
            'whitePizza' => $whitePizza->findAll(),
            'specialRed' => $specialRed->findAll(),
            'specialWhite' => $specialWhite->findAll(),
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
        return $this->render('main/legal_mentions.html.twig');
    }


}
