<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Repository\VehiculeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(
        VehiculeRepository $vehicules
    ): Response
    {
        $vehicules = $vehicules->findAllWithModeleMarqueAndOptions();

        return $this->render('accueil/index.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }
}
