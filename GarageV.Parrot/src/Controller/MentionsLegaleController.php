<?php
namespace App\Controller;

use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MentionsLegaleController extends AbstractController
{
  #[Route('/mentionslegale', name: 'app_mentionslegale', methods: ['GET'])]
  public function MentionsLegale(
    ServeRepository $serveRepository, 
    ScheduleRepository $scheduleRepository) : Response
  {
    return $this->render('mentionLegale/MentionsLegale.html.twig', [
      'serves' => $serveRepository->findAll(),
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}
