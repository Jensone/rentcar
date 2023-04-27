<?php

namespace App\Controller\Admin;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Reservation;
use App\Entity\Type;
use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{    
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
    }
    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('RentCar • Administration')
            ->renderContentMaximized()
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Agences', 'fas fa-cubes', Agence::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-users', Client::class);
        yield MenuItem::linkToCrud('Réservation', 'fas fa-calendar-alt', Reservation::class);
        yield MenuItem::linkToCrud('Véhicules', 'fas fa-car', Vehicule::class);
        yield MenuItem::linkToCrud('Marques de véhicule', 'fas fa-car', Marque::class);
        yield MenuItem::linkToCrud('Modèles de véhicule', 'fas fa-car', Modele::class);
        yield MenuItem::linkToCrud('Type de véhicule', 'fas fa-car', Type::class);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'accueil');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out');
    }
}
