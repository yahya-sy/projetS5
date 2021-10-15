<?php

namespace App\Controller;

use App\Entity\Offreemploi;
use App\Form\OffreemploiType;
use App\Repository\OffreemploiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offreemploi')]
class OffreemploiController extends AbstractController
{
    #[Route('/', name: 'offreemploi_index', methods: ['GET'])]
    public function index(OffreemploiRepository $offreemploiRepository): Response
    {
        return $this->render('offreemploi/index.html.twig', [
            'offreemplois' => $offreemploiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'offreemploi_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $offreemploi = new Offreemploi();
        $form = $this->createForm(OffreemploiType::class, $offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offreemploi);
            $entityManager->flush();

            return $this->redirectToRoute('offreemploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offreemploi/new.html.twig', [
            'offreemploi' => $offreemploi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'offreemploi_show', methods: ['GET'])]
    public function show(Offreemploi $offreemploi): Response
    {
        return $this->render('offreemploi/show.html.twig', [
            'offreemploi' => $offreemploi,
        ]);
    }

    #[Route('/{id}/edit', name: 'offreemploi_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offreemploi $offreemploi): Response
    {
        $form = $this->createForm(OffreemploiType::class, $offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offreemploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offreemploi/edit.html.twig', [
            'offreemploi' => $offreemploi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'offreemploi_delete', methods: ['POST'])]
    public function delete(Request $request, Offreemploi $offreemploi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreemploi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($offreemploi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offreemploi_index', [], Response::HTTP_SEE_OTHER);
    }
}
