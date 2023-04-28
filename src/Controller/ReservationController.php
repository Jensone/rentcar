<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\VehiculeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function index(
        ReservationRepository $reservation,
    ): Response
    {
        // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
        if (!$this->getUser()) {
            return $this->redirectToRoute('connexion');
            // Ajout d'un message flash
            $this->addFlash(
                'danger',
                'Vous devez être connecté pour accéder à cette page'
            );
        }
        
        // Si l'utilisateur est un client, on affiche ses réservations
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $reservations = $reservation->findBy(['client' => $this->getUser()]);
        }

        return $this->render('reservation/reservations.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    
}
