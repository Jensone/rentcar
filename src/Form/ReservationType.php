<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Vehicule;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_debut', DateType::class, ['widget' => 'single_text'])
            ->add('date_fin', DateType::class, ['widget' => 'single_text'])
            ->add('vehicule', EntityType::class, ['class' => Vehicule::class, 'choice_label' => 'marque'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
