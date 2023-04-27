<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    // Route pour afficher le formulaire de réservation
    #[Route('/reservation/new', name: 'reservation_new')]
    public function new(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer la réservation en BDD
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            // Rediriger vers la page d'accueil
            return $this->redirectToRoute('accueil');
        }

        return $this->render('reservation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
