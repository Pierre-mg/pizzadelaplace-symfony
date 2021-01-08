<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/", name="back_admin")
     */
    public function index(): Response
    {
        return $this->render('back/admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
