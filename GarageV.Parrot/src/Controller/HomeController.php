<?php
namespace App\Controller;

use App\Repository\ServeRepository;
use App\Repository\ViewRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_accueil', methods: ['GET'])]
  public function Accueil(ServeRepository $serveRepository, ViewRepository $viewRepository, ScheduleRepository $scheduleRepository) : Response
  {
    return $this->render('accueil/Accueil.html.twig', [
      'serves' => $serveRepository->findAll(),
      'views' => $viewRepository->findAll(),
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}