<?php

namespace App\Controller;


use App\Repository\OptionRepository;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    // Route pour afficher tous les véhicules
    #[Route('/vehicules', name: 'vehicules', methods: ['GET'])]
    public function index(
        VehiculeRepository $vehicules
    ): Response
    {
        $vehicules = $vehicules->findAllWithModeleMarqueAndOptions();

        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehicules,
        ]);
    }

    // Route pour afficher un véhicule
    #[Route('/vehicule/{id}', name: 'vehicule', methods: ['GET'])]
    public function show(
        $id, 
        VehiculeRepository $vehicule,
        OptionRepository $options
        ): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'item' => $vehicule->find($id),
            'options' => $options->findAll()
        ]);
    }

}
