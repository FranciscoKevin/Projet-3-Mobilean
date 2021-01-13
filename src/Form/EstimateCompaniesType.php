<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\DataClass\EstimateCompanies;

class EstimateCompaniesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('businessName', TextType::class, [
                'label' => 'Raison sociale : ',
            ])

            ->add('numberSIREN', TextType::class, [
                'label' => 'Numéro SIREN : ',
            ])

            ->add('fullName', TextType::class, [
                'label' => 'Nom complet de la personne à contacter : ',
            ])

            ->add('jobTitle', TextType::class, [
                'label' => 'Fonction de la personne à contacter : ',
            ])

            ->add('telephone', TelType::class, [
                'label' => 'Téléphone : ',
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email : ',
            ])

            ->add('address', TextType::class, [
                'label' => 'Adresse : ',
            ])

            ->add('zipCode', TextType::class, [
                'label' => 'Code postal : ',
            ])

            ->add('city', TextType::class, [
                'label' => 'Ville : ',
            ])

            ->add('isConnectedToGas', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => 'Votre local est-il relié au gaz naturel? ',
                'expanded' => true,
            ])

            ->add('numberOfVehicles', IntegerType::class, [
                'label' => 'Nombre approximatif de véhicules dans votre flotte : ',
            ])

            ->add('typeOfVehicles', ChoiceType::class, [
                'choices' => [
                    'Véhicules utilitaires' => 'commercialVehicles',
                    'Véhicules de tourisme' => 'tourismVehicles',
                    'Camions poids lourd' => 'heavyTrucks',
                ],
                'label' => 'Quel(s) type(s) de véhicule(s) possédez vous? ',
                'expanded' => true,
                'multiple' => true,
            ])

            ->add('averageDistance', IntegerType::class, [
                'label' => 'En moyenne, combien de kilomètres par an parcourent vos véhicules? ',
            ])

            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Avez-vous un message à ajouter? ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EstimateCompanies::class,
        ]);
    }
}
