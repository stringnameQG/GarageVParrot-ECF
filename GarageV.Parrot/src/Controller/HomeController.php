<?php
namespace App\Controller;

use App\Entity\View;
use App\Form\ViewType;
use App\Repository\ViewRepository;
use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\Criteria;


class HomeController extends AbstractController
{
  #[Route('/', name: 'app_accueil', methods: ['GET', 'POST'])]
  public function Accueil(
  ServeRepository $serveRepository, 
  ViewRepository $viewRepository,
  Request $request, 
  EntityManagerInterface $entityManager, 
  ScheduleRepository $scheduleRepository
  ) : Response
  { // ajout nombre view 
    $viewAffiche = 0;
    $criteria = Criteria::create()
      ->setFirstResult(0)  // Défine le premiée commentaire affiché
      ->setMaxResults($viewAffiche) // Définie le nombre de commentaire affiché
      ->andWhere(Criteria::expr()->eq('active', '1')); // On exclu les commentaire pas validé

    $views = $viewRepository->matching($criteria);

    $view = new View();
    $formulaireAvis = $this->createForm(ViewType::class, $view);
    $formulaireAvis->handleRequest($request);

    if ($formulaireAvis->isSubmitted() && $formulaireAvis->isValid()) {
      $entityManager->persist($view);
      $entityManager->flush();

      return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }
    
    return $this->render('accueil/Accueil.html.twig', [
      'serves' => $serveRepository->findAll(),
      'views' => $views,
      //'views' => $viewRepository->findAll(),
      'view' => $view,
      'formulaireAvis' => $formulaireAvis->createView(), // Ajout formulaire avis
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}