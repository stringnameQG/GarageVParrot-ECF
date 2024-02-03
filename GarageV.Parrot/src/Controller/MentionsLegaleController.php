<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MentionsLegaleController extends AbstractController
{
  #[Route('/mentionslegale', name: 'app_mentionslegale')]
  public function CGV() : Response
  {
    $nomPage = "Mentions légale";
    return $this->render('mentionLegale/MentionsLegale.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}
