<?php

namespace App\Controller;

use App\Entity\Demandeprojet;
use App\Form\DemandeprojetType;
use App\Repository\DemandeprojetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandeprojet')]
class DemandeprojetController extends AbstractController
{
    #[Route('/', name: 'demandeprojet_index', methods: ['GET'])]
    public function index(DemandeprojetRepository $demandeprojetRepository): Response
    {
        return $this->render('demandeprojet/index.html.twig', [
            'demandeprojets' => $demandeprojetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'demandeprojet_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $demandeprojet = new Demandeprojet();
        $form = $this->createForm(DemandeprojetType::class, $demandeprojet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demandeprojet);
            $entityManager->flush();

            return $this->redirectToRoute('demandeprojet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandeprojet/new.html.twig', [
            'demandeprojet' => $demandeprojet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'demandeprojet_show', methods: ['GET'])]
    public function show(Demandeprojet $demandeprojet): Response
    {
        return $this->render('demandeprojet/show.html.twig', [
            'demandeprojet' => $demandeprojet,
        ]);
    }

    #[Route('/{id}/edit', name: 'demandeprojet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandeprojet $demandeprojet): Response
    {
        $form = $this->createForm(DemandeprojetType::class, $demandeprojet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandeprojet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandeprojet/edit.html.twig', [
            'demandeprojet' => $demandeprojet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'demandeprojet_delete', methods: ['POST'])]
    public function delete(Request $request, Demandeprojet $demandeprojet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandeprojet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demandeprojet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demandeprojet_index', [], Response::HTTP_SEE_OTHER);
    }
}
