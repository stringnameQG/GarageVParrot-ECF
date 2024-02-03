<?php

namespace App\Controller;

use App\Entity\View;
use App\Form\ViewType;
use App\Repository\ViewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route('/view')]
class ViewController extends AbstractController
{
    #[Route('/', name: 'app_view_index', methods: ['GET'])]
    public function index(ViewRepository $viewRepository): Response
    {
        return $this->render('view/index.html.twig', [
            'views' => $viewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_view_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $view = new View();
        $form = $this->createForm(ViewType::class, $view);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($view);
            $entityManager->flush();

            return $this->redirectToRoute('app_view_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('view/new.html.twig', [
            'view' => $view,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_view_show', methods: ['GET'])]
    public function show(View $view): Response
    {
        return $this->render('view/show.html.twig', [
            'view' => $view,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_view_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, View $view, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ViewType::class, $view);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_view_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('view/edit.html.twig', [
            'view' => $view,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_view_delete', methods: ['POST'])]
    public function delete(Request $request, View $view, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$view->getId(), $request->request->get('_token'))) {
            $entityManager->remove($view);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_view_index', [], Response::HTTP_SEE_OTHER);
    }
}
