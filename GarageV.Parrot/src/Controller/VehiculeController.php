<?php
namespace App\Controller;

use App\Entity\Car;
use App\Entity\Picturecar;
use App\Form\CarType;
use App\Repository\CarRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\Criteria;


#[Route('/vehicule')]
class VehiculeController extends AbstractController
{
    #[Route('/{page<\d+>?1}', name: 'app_vehicule', methods: ['GET'])]
    public function index(
    CarRepository $carRepository, 
    int $page, 
    ScheduleRepository $scheduleRepository
    ): Response
    {   // On défini le nombre de voiture par page dans une variable
        $carPerPage = 9;
        // On crée ensuite une variable qui contien les paramétres de notre méthode critéria
        $criteria = Criteria::create()
            ->setFirstResult(($page - 1) * $carPerPage)  // Défine la premiére voiture affiché
            ->setMaxResults($carPerPage);  // Définie le nombre de voiture affiché

        $cars = $carRepository->matching($criteria);

        $totalCars = count($carRepository->matching(Criteria::create()));

        $totalPages = ceil($totalCars / $carPerPage);

        return $this->render('vehicule/Vehicule.html.twig', [
            'cars' => $cars,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'schedules' => $scheduleRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_vehicule_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('vehicule/Vehicule.html.twig', [
            'car' => $car,
        ]);
    }
}