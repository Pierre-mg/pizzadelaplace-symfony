<?php

namespace App\Controller;

use App\Repository\RedPizzaRepository;
use App\Repository\SpecialRedRepository;
use App\Repository\SpecialWhiteRepository;
use App\Repository\WhitePizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(RedPizzaRepository $redPizza, WhitePizzaRepository $whitePizza, SpecialRedRepository $specialRed, SpecialWhiteRepository $specialWhite): Response
    {
        return $this->render('main/index.html.twig', [
            'redPizza' => $redPizza->findAll(),
            'whitePizza' => $whitePizza->findAll(),
            'specialRed' => $specialRed,
            'specialWhite' => $specialWhite]);
    }
}
