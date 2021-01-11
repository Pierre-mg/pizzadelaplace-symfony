<?php

namespace App\Controller\Admin;

use App\Entity\Information;
use App\Form\InformationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\InformationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/information")
 */
class InformationController extends AbstractController
{
    /**
     * @Route("/", name="information_index", methods={"GET"})
     */
    public function index(InformationRepository $informationRepository): Response
    {
        return $this->render('admin/information/index.html.twig', [
            'informations' => $informationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Information $information = null, EntityManagerInterface $manager): Response
    {
        if (!$information) {
            throw $this->createNotFoundException('Information non trouvée.');
        }

        $form = $this->createForm(InformationType::class, $information);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Information modifiée avec succès.');

            return $this->redirectToRoute('information_index');
        }

        return $this->render('admin/information/edit.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
        ]);
    }

}
