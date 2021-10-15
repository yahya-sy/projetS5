<?php

namespace App\Controller;

use App\Entity\Pagedacceuil;
use App\Form\PagedacceuilType;
use App\Repository\PagedacceuilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pagedacceuil')]
class PagedacceuilController extends AbstractController
{
    #[Route('/', name: 'pagedacceuil_index', methods: ['GET'])]
    public function index(PagedacceuilRepository $pagedacceuilRepository): Response
    {
        return $this->render('pagedacceuil/index.html.twig', [
            'pagedacceuils' => $pagedacceuilRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'pagedacceuil_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $pagedacceuil = new Pagedacceuil();
        $form = $this->createForm(PagedacceuilType::class, $pagedacceuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pagedacceuil);
            $entityManager->flush();

            return $this->redirectToRoute('pagedacceuil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pagedacceuil/new.html.twig', [
            'pagedacceuil' => $pagedacceuil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'pagedacceuil_show', methods: ['GET'])]
    public function show(Pagedacceuil $pagedacceuil): Response
    {
        return $this->render('pagedacceuil/show.html.twig', [
            'pagedacceuil' => $pagedacceuil,
        ]);
    }

    #[Route('/{id}/edit', name: 'pagedacceuil_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pagedacceuil $pagedacceuil): Response
    {
        $form = $this->createForm(PagedacceuilType::class, $pagedacceuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pagedacceuil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pagedacceuil/edit.html.twig', [
            'pagedacceuil' => $pagedacceuil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'pagedacceuil_delete', methods: ['POST'])]
    public function delete(Request $request, Pagedacceuil $pagedacceuil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pagedacceuil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pagedacceuil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pagedacceuil_index', [], Response::HTTP_SEE_OTHER);
    }
}
