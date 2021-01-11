<?php

namespace App\Controller\Admin;

use App\Entity\Wine;
use App\Form\WineType;
use App\Repository\WineRepository;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/wine")
 */
class WineController extends AbstractController
{
    /**
     * @Route("/", name="wine_index", methods={"GET"})
     */
    public function index(WineRepository $wineRepository, SectionRepository $section): Response
    {
        return $this->render('admin/wine/index.html.twig', [
            'wines' => $wineRepository->findAll(),
            'section' => $section->find(7)
        ]);
    }

    /**
     * @Route("/new", name="wine_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $wine = new Wine();
        $form = $this->createForm(WineType::class, $wine);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($wine);
            $manager->flush();

            $this->addFlash('success', 'Vin ajouté avec succès.');

            return $this->redirectToRoute('wine_index');
        }

        return $this->render('admin/wine/new.html.twig', [
            'wine' => $wine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="wine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, wine $wine = null, EntityManagerInterface $manager): Response
    {
        if(!$wine) {
            throw $this->createNotFoundException('Vin non trouvé.');
        }

        $form = $this->createForm(WineType::class, $wine);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('warning', 'Vin modifié avec succès.');

            return $this->redirectToRoute('wine_index');
        }

        return $this->render('admin/wine/edit.html.twig', [
            'wine' => $wine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="wine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, wine $wine = null, EntityManagerInterface $manager): Response
    {
        if (!$wine) {
            throw $this->createNotFoundException('Vin non trouvé.');
        }

        if ($this->isCsrfTokenValid('delete'.$wine->getId(), $request->request->get('_token'))) {
            
            $manager->remove($wine);
            $manager->flush();

            $this->addFlash('danger', 'Vin supprimé définitivement.');
        }

        return $this->redirectToRoute('wine_index');
    }
}
