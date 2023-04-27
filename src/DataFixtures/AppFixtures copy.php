<?php

// namespace App\DataFixtures;

// use DateTime;
// use App\Entity\Client;
// use App\Entity\Reservation;
// use App\Entity\Type;
// use App\Entity\Agence;
// use App\Entity\Marque;
// use App\Entity\Modele;
// use App\Entity\Option;
// use App\Entity\Vehicule;
// use Doctrine\Persistence\ObjectManager;
// use Doctrine\Bundle\FixturesBundle\Fixture;

// class AppFixtures extends Fixture
// {
//     public function load(ObjectManager $manager): void
//     {
//          // Création des types de véhicules
//          $types = ['Citadine', 'Compacte', 'Berline', 'SUV', 'Utilitaire'];
//          foreach ($types as $typeNom) {
//              $type = new Type();
//              $type->setNom($typeNom);
//              $manager->persist($type);
//          }
 
//          // Création des options
//          $optionsData = [
//              ['Climatisation', 5],
//              ['GPS', 7],
//              ['Siège enfant', 4],
//              ['Siège bébé', 4],
//              ['Chaînes neige', 8],
//          ];
//          $options = [];
//          foreach ($optionsData as $optionData) {
//              $option = new Option();
//              $option->setNom($optionData[0]);
//              $option->setPrix($optionData[1]);
//              $options[] = $option;
//              $manager->persist($option);
//          }
 
//          // Création des marques et modèles de véhicules
//          $marquesData = [
//              ['Peugeot', 'France', ['208', '308', '508']],
//              ['Renault', 'France', ['Clio', 'Mégane', 'Talisman']],
//              ['Volkswagen', 'Allemagne', ['Golf', 'Passat', 'Tiguan']],
//              ['Toyota', 'Japon', ['Yaris', 'Corolla', 'Camry']],
//              ['Ford', 'USA', ['Fiesta', 'Focus', 'Mustang']],
//          ];
//          $marques = [];
//          foreach ($marquesData as $marqueData) {
//              $marque = new Marque();
//              $marque->setNom($marqueData[0]);
//              $marque->setPays($marqueData[1]);
//              foreach ($marqueData[2] as $modeleNom) {
//                  $modele = new Modele();
//                  $modele->setNom($modeleNom);
//                  $modele->setAnnee(rand(2000, 2022));
//                  $modele->setPuissance(rand(80, 400));
//                  $modele->setType($manager->getRepository(Type::class)->findOneBy(['nom' => $types[array_rand($types)]]));
//                  $modele->setMarque($marque);
//                  $manager->persist($modele);
//              }
//              $marques[] = $marque;
//              $manager->persist($marque);
//          }
 
//          // Création des agences
//          $agencesData = [
//              ['Paris', '5 Rue de la Paix', '01 23 45 67 89', 'paris@location-voitures.com'],
//              ['Lyon', '32 Rue de la République', '01 23 45 67 88', 'lyon@location-voitures.com'],
//          ];

//          $agences = [];
//          foreach ($agencesData as $agenceData) {
//              $agence = new Agence();
//              $agence->setNom($agenceData[0]);
//              $agence->setAdresse($agenceData[1]);
//              $agence->setTel($agenceData[2]);
//              $agence->setEmail($agenceData[3]);
//              $agences[] = $agence;
//              $manager->persist($agence);
//          }
     
//          // Création des véhicules
//          $vehiculesData = [
//              ['AB-123-CD', $marques[0]->getModeles()[0], $agences[0], true, 45.99],
//              ['EF-456-GH', $marques[1]->getModeles()[1], $agences[1], true, 52.99],
//              ['IJ-789-KL', $marques[2]->getModeles()[2], $agences[0], false, 63.99],
//              ['MN-234-OP', $marques[3]->getModeles()[0], $agences[1], true, 37.99],
//              ['QR-567-ST', $marques[4]->getModeles()[1], $agences[0], true, 41.99],
//          ];
//          $vehicules = [];
//          foreach ($vehiculesData as $vehiculeData) {
//              $vehicule = new Vehicule();
//              $vehicule->setImmatriculation($vehiculeData[0]);
//              $vehicule->setModele($vehiculeData[1]);
//              $vehicule->setAgence($vehiculeData[2]);
//              $vehicule->setDisponible($vehiculeData[3]);
//              $vehicule->setPrix($vehiculeData[4]);
//              $vehicule->addOption($options[array_rand($options)]);
//              $vehicules[] = $vehicule;
//              $manager->persist($vehicule);
//          }
     
//          // Création des clients
//          $clientsData = [
//              ['Dupont', 'Jean', '2 Avenue des Lilas', '134567890', 'jean.dupont@gmail.com'],
//              ['Martin', 'Pierre', '8 Rue de la Gare', '678901234', 'pierre.martin@orange.fr'],
//              ['Durand', 'Marie', '25 Rue des Roses', '123456789', 'marie.durand@hotmail.com'],
//          ];
//          $clients = [];
//          foreach ($clientsData as $clientData) {
//              $client = new Client();
//              $client->setNom($clientData[0]);
//              $client->setPrenom($clientData[1]);
//              $client->setAdresse($clientData[2]);
//              $client->setTel($clientData[3]);
//              $client->setEmail($clientData[4]);
//              $client->setPassword('$2y$13$9L9lMCcbbJXwA0kQmNgMROxCQimd37I.FLX0hxD.3wHWFCS2gTpny');
//              $clients[] = $client;
//              $manager->persist($client);
//          }
     
//          // Création des réservations
//          $reservationsData = [
//              [$clients[0], $vehicules[0], new DateTime('2023-05-05'), new DateTime('2023-05-07')],
//              [$clients[1], $vehicules[1], new DateTime('2023-06-10'), new DateTime('2023-06-13')],
//              [$clients[2], $vehicules[2], new DateTime('2023-07-01'), new DateTime('2023-07-05')],
//             ];
//             foreach ($reservationsData as $reservationData) {
//                 $reservation = new Reservation();
//                 $reservation->setClient($reservationData[0]);
//                 $reservation->setVehicule($reservationData[1]);
//                 $reservation->setDateDebut($reservationData[2]);
//                 $reservation->setDateFin($reservationData[3]);
//                 $manager->persist($reservation);
//             }
            
//             // Sauvegarde en base de données
//             $manager->flush();
            
//     }
}
