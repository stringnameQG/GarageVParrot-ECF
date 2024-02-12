<?php
namespace App\Controller;

use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CGVController extends AbstractController
{
  #[Route('/cgv', name: 'app_cgv', methods: ['GET'])]
  public function CGV(
    ServeRepository $serveRepository, 
    ScheduleRepository $scheduleRepository) : Response
  {
    return $this->render('cgv/CGV.html.twig', [
      'serves' => $serveRepository->findAll(),
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}
