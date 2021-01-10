<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use App\Form\SectionType;
use App\Repository\SectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/section")
 */
class SectionController extends AbstractController
{
    /**
     * @Route("/", name="section_index", methods={"GET"})
     */
    public function index(SectionRepository $sectionRepository): Response
    {
        return $this->render('admin/section/index.html.twig', [
            'sections' => $sectionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="section_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Section $section = null, EntityManagerInterface $manager): Response
    {
        if (!$section) {
            throw $this->createNotFoundException('Section inexistante.');
        }

        $form = $this->createForm(SectionType::class, $section, 
            ['attr' => [
                    'novalidate' => 'novalidate'
                ]
            ]);

        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {

            

            $manager->flush();

            $this->addFlash('success', 'Section modifiée avec succès');

            return $this->redirectToRoute('section_index');
        }

        return $this->render('admin/section/edit.html.twig', [
            'section' => $section,
            'form' => $form->createView(),
        ]);
    }

}
