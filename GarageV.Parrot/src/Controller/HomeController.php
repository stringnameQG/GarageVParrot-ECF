<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_accueil')]
  public function Accueil() : Response
  {
    $nomPage = "Accueil";
    return $this->render('accueil/Accueil.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}