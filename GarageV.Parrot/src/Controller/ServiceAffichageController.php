<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ServiceAffichageController extends AbstractController
{
  #[Route('/service', name: 'app_service')]
  public function ServiceAffichage() : Response
  {
    $nomPage = "Service";
    return $this->render('service/ServiceAffichage.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}