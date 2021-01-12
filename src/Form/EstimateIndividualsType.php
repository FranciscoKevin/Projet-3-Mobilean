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
use App\DataClass\EstimateIndividuals;

class EstimateIndividualsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom : ',
            ])

            ->add('lastName', TextType::class, [
                'label' => 'Nom de famille : ',
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
                'label' => 'Votre domicile est-il relié au gaz naturel? ',
                'expanded' => true,
            ])

            ->add('numberOfVehicles', IntegerType::class, [
                'label' => 'Nombre de véhicules dans votre foyer : ',
            ])

            ->add('typeOfVehicles', ChoiceType::class, [
                'choices' => [
                    'Véhicules utilitaires' => 'commercialVehicles',
                    'Véhicules de tourisme' => 'tourismVehicle',
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
            'data_class' => EstimateIndividuals::class,
        ]);
    }
}
