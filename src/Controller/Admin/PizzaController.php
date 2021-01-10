<?php

namespace App\Controller\Admin;

use App\Entity\Pizza;
use App\Form\PizzaType;
use App\Repository\PizzaRepository;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pizza")
 */
class PizzaController extends AbstractController
{
    /**
     * @Route("/", name="pizza_index", methods={"GET"})
     */
    public function index(PizzaRepository $pizzaRepository, SectionRepository $section): Response
    {
        return $this->render('admin/pizza/index.html.twig', [
            'pizzas' => $pizzaRepository->findAll(),
            'sections' => $section->findAll()
        ]);
    }

    /**
     * @Route("/new", name="pizza_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $pizza = new Pizza();
        $form = $this->createForm(PizzaType::class, $pizza);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($pizza);
            $manager->flush();

            $this->addFlash('success', 'Pizza ajoutée avec succès.');

            return $this->redirectToRoute('pizza_index');
        }

        return $this->render('admin/pizza/new.html.twig', [
            'pizza' => $pizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="pizza_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pizza $pizza = null, EntityManagerInterface $manager): Response
    {
        if(!$pizza) {
            throw $this->createNotFoundException('Pizza non trouvée.');
        }

        $form = $this->createForm(PizzaType::class, $pizza);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Pizza modifiée avec succès.');

            return $this->redirectToRoute('pizza_index');
        }

        return $this->render('admin/pizza/edit.html.twig', [
            'pizza' => $pizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="pizza_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pizza $pizza = null, EntityManagerInterface $manager): Response
    {
        if (!$pizza) {
            throw $this->createNotFoundException('Pizza non trouvée.');
        }
        if ($this->isCsrfTokenValid('delete'.$pizza->getId(), $request->request->get('_token'))) {
            
            $manager->remove($pizza);
            $manager->flush();

            $this->addFlash('danger', 'Pizza supprimée définitivement.');
        }

        return $this->redirectToRoute('pizza_index');
    }
}
