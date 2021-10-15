<?php

namespace App\Controller;

use App\Entity\Reponseoffre;
use App\Form\ReponseoffreType;
use App\Repository\ReponseoffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponseoffre')]
class ReponseoffreController extends AbstractController
{
    #[Route('/', name: 'reponseoffre_index', methods: ['GET'])]
    public function index(ReponseoffreRepository $reponseoffreRepository): Response
    {
        return $this->render('reponseoffre/index.html.twig', [
            'reponseoffres' => $reponseoffreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'reponseoffre_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $reponseoffre = new Reponseoffre();
        $form = $this->createForm(ReponseoffreType::class, $reponseoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reponseoffre);
            $entityManager->flush();

            return $this->redirectToRoute('reponseoffre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponseoffre/new.html.twig', [
            'reponseoffre' => $reponseoffre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reponseoffre_show', methods: ['GET'])]
    public function show(Reponseoffre $reponseoffre): Response
    {
        return $this->render('reponseoffre/show.html.twig', [
            'reponseoffre' => $reponseoffre,
        ]);
    }

    #[Route('/{id}/edit', name: 'reponseoffre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reponseoffre $reponseoffre): Response
    {
        $form = $this->createForm(ReponseoffreType::class, $reponseoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponseoffre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponseoffre/edit.html.twig', [
            'reponseoffre' => $reponseoffre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reponseoffre_delete', methods: ['POST'])]
    public function delete(Request $request, Reponseoffre $reponseoffre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponseoffre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reponseoffre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reponseoffre_index', [], Response::HTTP_SEE_OTHER);
    }
}
