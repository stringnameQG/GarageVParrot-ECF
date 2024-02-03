<?php

namespace App\Controller;

use App\Entity\Serve;
use App\Form\ServeType;
use App\Repository\ServeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/serve')]
class ServeController extends AbstractController
{
    #[Route('/', name: 'app_serve_index', methods: ['GET'])]
    public function index(ServeRepository $serveRepository): Response
    {
        return $this->render('serve/index.html.twig', [
            'serves' => $serveRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_serve_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $serve = new Serve();
        $form = $this->createForm(ServeType::class, $serve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serve);
            $entityManager->flush();

            return $this->redirectToRoute('app_serve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('serve/new.html.twig', [
            'serve' => $serve,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_serve_show', methods: ['GET'])]
    public function show(Serve $serve): Response
    {
        return $this->render('serve/show.html.twig', [
            'serve' => $serve,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_serve_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Serve $serve, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServeType::class, $serve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_serve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('serve/edit.html.twig', [
            'serve' => $serve,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_serve_delete', methods: ['POST'])]
    public function delete(Request $request, Serve $serve, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serve->getId(), $request->request->get('_token'))) {
            $entityManager->remove($serve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_serve_index', [], Response::HTTP_SEE_OTHER);
    }
}
