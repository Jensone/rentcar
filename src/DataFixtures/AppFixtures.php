<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Reservation;
use App\Entity\Vehicule;
use App\Entity\Type;
use App\Entity\Client;
use App\Entity\Agence;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Option;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des comptes clients
        $clientsData = [
            ['Dupont', 'Jean', '2 Avenue des Lilas', '134567890', 'jean.dupont@gmail.com'],
            ['Martin', 'Pierre', '8 Rue de la Gare', '678901234', 'pierre.martin@orange.fr'],
            ['Durand', 'Marie', '25 Rue des Roses', '123456789', 'marie.durand@hotmail.com'],
        ];
        $clients = [];
        foreach ($clientsData as $clientData) {
            $client = new Client();
            $client->setNom($clientData[0]);
            $client->setPrenom($clientData[1]);
            $client->setAdresse($clientData[2]);
            $client->setTel($clientData[3]);
            $client->setEmail($clientData[4]);
            $client->setPassword('$2y$13$9L9lMCcbbJXwA0kQmNgMROxCQimd37I.FLX0hxD.3wHWFCS2gTpny');
            $clients[] = $client;
            $manager->persist($client);
        }
        
        // Création des agences
        $agencesData = [
            ['Agence Paris', '10 Rue de la Paix', '123456789', 'contact@agenceparis.com'],
            ['Agence Marseille', '20 Boulevard de la Mer', '456789012', 'contact@agencemarseille.com'],
        ];
        $agences = [];
        foreach ($agencesData as $agenceData) {
            $agence = new Agence();
            $agence->setNom($agenceData[0]);
            $agence->setAdresse($agenceData[1]);
            $agence->setTel($agenceData[2]);
            $agence->setEmail($agenceData[3]);
            $agences[] = $agence;
            $manager->persist($agence);
        }
        
        // Création des marques de véhicules
        $marquesData = [
            ['Renault', ['Clio', 'Megane', 'Captur']],
            ['Peugeot', ['208', '308', '3008']],
            ['Citroen', ['C3', 'C4', 'C5']],
        ];
        $marques = [];
        foreach ($marquesData as $marqueData) {
            $marque = new Marque();
            $marque->setNom($marqueData[0]);
            $marque->setPays('France');
            foreach ($marqueData[1] as $modeleNom) {
                $modele = new Modele();
                $modele->setNom($modeleNom);
                $modele->setAnnee(2020);
                $modele->setPuissance(200);
                $modele->setMarque($marque);
                $manager->persist($modele);
                $marque->addModele($modele);
            }
            $marques[] = $marque;
            $manager->persist($marque);
        }
        
        // Création des types de véhicules
        $typesData = [
            ['Citadine'],
            ['Berline'],
            ['Monospace'],
            ['SUV']
        ];
        $types = [];
        foreach ($typesData as $typeData) {
            $type = new Type();
            $type->setNom($typeData[0]);
            $types[] = $type;
            $manager->persist($type);
        }
        
        // Création des options de véhicules
        $optionsData = [
            ['GPS', 9.99],
            ['Siège bébé', 4.99],
            ['Porte-skis', 12.99],
            ['Coffre de toit', 19.99],
            ['Chaînes à neige', 7.99]
        ];
        $options = [];
        foreach ($optionsData as $optionData) {
            $option = new Option();
            $option->setNom($optionData[0]);
            $option->setPrix($optionData[1]);
            $options[] = $option;
            $manager->persist($option);
        }


        $manager->flush();
            
    }
}
