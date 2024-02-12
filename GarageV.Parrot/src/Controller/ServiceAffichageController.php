<?php
namespace App\Controller;

use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ServiceAffichageController extends AbstractController
{
  #[Route('/service', name: 'app_service', methods: ['GET'])]
  public function ServiceAffichage(
    ServeRepository $serveRepository, 
    ScheduleRepository $scheduleRepository
  ) : Response
  {
    return $this->render('service/ServiceAffichage.html.twig', [
      'serves' => $serveRepository->findAll(),
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}