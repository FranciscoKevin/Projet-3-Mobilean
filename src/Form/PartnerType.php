<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\DataClass\Partnership;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('businessName', TextType::class, [
                'label' => 'Raison sociale : ',
            ])

            ->add('expertise', ChoiceType::class, [
                'choices' => [
                    'Professionnel du Gaz - Installation' => 'Installation',
                    'Professionnel du Gaz - Maintenance' => 'Maintenance',
                    'Autre' => 'Autre',
                    'Aucune' => 'Aucune',
                ],
                'label' => 'Type d\'expertise : ',
                'expanded' => true,
            ])

            ->add('otherExpertise', TextType::class, [
                'label' => 'Si autre type expertise, préciser : ',
                'required' => false,
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
                'label' => 'Téléphone de la personne à contacter : ',
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email de la personne à contacter : ',
            ])

            ->add('address', TextType::class, [
                'label' => 'Adresse de l\'entreprise : ',
            ])

            ->add('zipCode', TextType::class, [
                'label' => 'Code postal : ',
            ])

            ->add('city', TextType::class, [
                'label' => 'Ville : ',
            ])

            ->add('workforce', IntegerType::class, [
                'label' => 'Effectif de l\'entreprise : ',
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
            'data_class' => Partnership::class,
        ]);
    }
}
