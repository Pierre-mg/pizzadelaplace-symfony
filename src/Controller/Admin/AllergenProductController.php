<?php

namespace App\Controller\Admin;

use App\Entity\AllergenProduct;
use App\Form\AllergenProductType;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AllergenProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/allergen_product")
 */
class AllergenProductController extends AbstractController
{
    /**
     * @Route("/", name="allergen_product_index", methods={"GET"})
     */
    public function index(AllergenProductRepository $allergenProductRepository, SectionRepository $section): Response
    {
        return $this->render('admin/allergen_product/index.html.twig', [
            'allergens' => $allergenProductRepository->findAll(),
            'section' => $section->find(8)
        ]);
    }

    /**
     * @Route("/new", name="allergen_product_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $allergen = new AllergenProduct();
        $form = $this->createForm(AllergenProductType::class, $allergen);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($allergen);
            $manager->flush();

            $this->addFlash('success', 'Produit allergène ajouté avec succès.');

            return $this->redirectToRoute('allergen_product_index');
        }

        return $this->render('admin/allergen_product/new.html.twig', [
            'allergen' => $allergen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="allergen_product_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AllergenProduct $allergen = null, EntityManagerInterface $manager): Response
    {
        if(!$allergen) {
            throw $this->createNotFoundException('Produit allergène non trouvé.');
        }

        $form = $this->createForm(AllergenProductType::class, $allergen);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Produit allergène modifié avec succès.');

            return $this->redirectToRoute('allergen_product_index');
        }

        return $this->render('admin/allergen_product/edit.html.twig', [
            'allergen' => $allergen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="allergen_product_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AllergenProduct $allergen = null, EntityManagerInterface $manager): Response
    {
        if (!$allergen) {
            throw $this->createNotFoundException('Produit allergène non trouvé.');
        }

        if ($this->isCsrfTokenValid('delete'.$allergen->getId(), $request->request->get('_token'))) {
            
            $manager->remove($allergen);
            $manager->flush();

            $this->addFlash('danger', 'Produit allergène supprimé définitivement.');
        }

        return $this->redirectToRoute('allergen_product_index');
    }
}
