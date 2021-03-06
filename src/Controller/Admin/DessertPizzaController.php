<?php

namespace App\Controller\Admin;


use App\Entity\DessertPizza;
use App\Form\DessertPizzaType;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DessertPizzaRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/pizza-dessert")
 */
class DessertPizzaController extends AbstractController
{
    /**
     * @Route("/", name="dessert_pizza_index", methods={"GET"})
     */
    public function index(DessertPizzaRepository $dessertPizzaRepository, SectionRepository $section): Response
    {
        return $this->render('admin/dessert_pizza/index.html.twig', [
            'pizzas' => $dessertPizzaRepository->findAll(),
            'section' => $section->find(5)
        ]);
    }

    /**
     * @Route("/new", name="dessert_pizza_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $pizza = new DessertPizza();
        $form = $this->createForm(DessertPizzaType::class, $pizza);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($pizza);
            $manager->flush();

            $this->addFlash('success', 'Pizza ajoutée avec succès.');

            return $this->redirectToRoute('dessert_pizza_index');
        }

        return $this->render('admin/dessert_pizza/new.html.twig', [
            'pizza' => $pizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="dessert_pizza_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DessertPizza $pizza = null, EntityManagerInterface $manager): Response
    {
        if(!$pizza) {
            throw $this->createNotFoundException('Pizza non trouvée.');
        }

        $form = $this->createForm(DessertPizzaType::class, $pizza);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Pizza modifiée avec succès.');

            return $this->redirectToRoute('dessert_pizza_index');
        }

        return $this->render('admin/dessert_pizza/edit.html.twig', [
            'pizza' => $pizza,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="dessert_pizza_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DessertPizza $pizza = null, EntityManagerInterface $manager): Response
    {
        if (!$pizza) {
            throw $this->createNotFoundException('Pizza non trouvée.');
        }
        if ($this->isCsrfTokenValid('delete'.$pizza->getId(), $request->request->get('_token'))) {
            
            $manager->remove($pizza);
            $manager->flush();

            $this->addFlash('danger', 'Pizza supprimée définitivement.');
        }

        return $this->redirectToRoute('dessert_pizza_index');
    }
}
