<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Type;
use App\Entity\Option;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    #[Route('/vehicules', name: 'vehicules')]
    public function index(): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'controller_name' => 'VehiculeController',
        ]);
    }

    // #[Route('/vehicule', name: 'app_vehicule_show')]
    // public function searchVehicules(Request $request, VehiculeRepository $vehiculeRepository)
    // {
    //     $form = $this->createFormBuilder()
    //         ->add('marque', EntityType::class, [
    //             'class' => Marque::class,
    //             'placeholder' => 'Choisissez une marque',
    //             'required' => false
    //         ])
    //         ->add('type', EntityType::class, [
    //             'class' => Type::class,
    //             'placeholder' => 'Choisissez un type',
    //             'required' => false
    //         ])
    //         ->add('options', EntityType::class, [
    //             'class' => Option::class,
    //             'placeholder' => 'Choisissez une option',
    //             'required' => false,
    //             'multiple' => true
    //         ])
    //         ->getForm();

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $data = $form->getData();
    //         $vehicules = $vehiculeRepository->findVehiculesByCriteria($data['marque'], $data['type'], $data['options']);

    //         return $this->render('vehicule/search.html.twig', [
    //             'form' => $form->createView(),
    //             'vehicules' => $vehicules
    //         ]);
    //     }

    //     return $this->render('vehicule/search.html.twig', [
    //         'form' => $form->createView()
    //     ]);
    // }
}
