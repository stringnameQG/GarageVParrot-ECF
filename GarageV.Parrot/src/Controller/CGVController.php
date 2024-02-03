<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CGVController extends AbstractController
{
  #[Route('/cgv', name: 'app_cgv')]
  public function CGV() : Response
  {
    $nomPage = "CGV";
    return $this->render('cgv/CGV.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}
