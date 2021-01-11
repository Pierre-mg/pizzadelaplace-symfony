<?php

namespace App\Controller\Admin;

use App\Entity\Drink;
use App\Form\DrinkType;
use App\Repository\DrinkRepository;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/drink")
 */
class DrinkController extends AbstractController
{
    /**
     * @Route("/", name="drink_index", methods={"GET"})
     */
    public function index(DrinkRepository $drinkRepository, SectionRepository $section): Response
    {
        return $this->render('admin/drink/index.html.twig', [
            'drinks' => $drinkRepository->findAll(),
            'section' => $section->find(6)
        ]);
    }

    /**
     * @Route("/new", name="drink_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $drink = new Drink();
        $form = $this->createForm(DrinkType::class, $drink);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($drink);
            $manager->flush();

            $this->addFlash('success', 'Boisson ajoutée avec succès.');

            return $this->redirectToRoute('drink_index');
        }

        return $this->render('admin/drink/new.html.twig', [
            'drink' => $drink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="drink_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Drink $drink = null, EntityManagerInterface $manager): Response
    {
        if(!$drink) {
            throw $this->createNotFoundException('Boisson non trouvée.');
        }

        $form = $this->createForm(DrinkType::class, $drink);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Boisson modifiée avec succès.');

            return $this->redirectToRoute('drink_index');
        }

        return $this->render('admin/drink/edit.html.twig', [
            'drink' => $drink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="drink_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Drink $drink = null, EntityManagerInterface $manager): Response
    {
        if (!$drink) {
            throw $this->createNotFoundException('Boisson non trouvée.');
        }
        if ($this->isCsrfTokenValid('delete'.$drink->getId(), $request->request->get('_token'))) {
            
            $manager->remove($drink);
            $manager->flush();

            $this->addFlash('danger', 'Boisson supprimée définitivement.');
        }

        return $this->redirectToRoute('drink_index');
    }
}
