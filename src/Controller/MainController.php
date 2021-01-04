<?php

namespace App\Controller;

use App\Repository\RedPizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(RedPizzaRepository $redPizza): Response
    {
        return $this->render('main/index.html.twig', ['redPizza' => $redPizza->findAll()]);
    }
}
