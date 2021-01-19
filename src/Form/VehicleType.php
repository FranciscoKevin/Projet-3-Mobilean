<?php

namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du véhicule : ',
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description du véhicule : ',
            ])

            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Utilitaire' => 'Utilitaire',
                    'Particulier' => 'Particulier',
                ],
                'label' => 'Le type du véhicule : ',
                'expanded' => true,
            ])

            ->add('fiscalPower', IntegerType::class, [
                'label' => 'Puissance fiscale : ',
            ])

            ->add('actualPower', IntegerType::class, [
                'label' => 'Puissance réelle : ',
            ])

            ->add('tankCapacityCNG', IntegerType::class, [
                'label' => 'Capacité reservoir GNV : ',
            ])

            ->add('consumptionCNG', IntegerType::class, [
                'label' => 'Consommation GNV : ',
            ])

            ->add('tankCapacityFuel', IntegerType::class, [
                'label' => 'Capacité carburant : ',
            ])

            ->add('consumptionFuel', IntegerType::class, [
                'label' => 'Consomation carburant : ',
            ])

            ->add('autonomy', IntegerType::class, [
                'label' => 'Autonomie : ',
            ])

            ->add('rearVolume', IntegerType::class, [
                'label' => 'Volume compartiment arrière : ',
            ])

            ->add('vehiclePhoto', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => true,
                'label' => 'Image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
