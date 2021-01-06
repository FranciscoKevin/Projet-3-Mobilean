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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('businessName', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Length(['min' => 2, 'max' => 255,]),
                ],
                'label' => 'Raison sociale : ',
            ])
            ->add('expertise', ChoiceType::class, [
                'choices' => [
                    'Professionnel du Gaz - Installation' => 'Installation',
                    'Professionnel du Gaz - Maintenance' => 'Maintenance',
                    'Autre' => 'Autre',
                    'Aucune' => 'Aucune',
                ],
                'constraints' => [new NotBLank(),],
                'label' => 'Type d\'expertise : ',
                'expanded' => true,
            ])
            ->add('otherExpertise', TextType::class, [
                'constraints' => [new Length(['max' => 255,]),],
                'label' => 'Si autre type expertise, préciser : ',
                'required' => false,
            ])
            ->add('numberSIREN', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Regex(['pattern' => '/^[0-9]+$/']),
                    new Length(['min' => 9, 'max' => 9,]),
                ],
                'label' => 'Numéro SIREN : ',
            ])
            ->add('fullName', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Length(['min' => 2, 'max' => 255,]),
                ],
                'label' => 'Nom complet de la personne à contacter : ',
            ])
            ->add('jobTitle', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Length(['min' => 2, 'max' => 255,]),
                ],
                'label' => 'Fonction de la personne à contacter : ',
            ])
            ->add('telephone', TelType::class, [
                'constraints' => [new NotBLank(),],
                'label' => 'Téléphone de la personne à contacter : ',
            ])
            ->add('email', EmailType::class, [
                'constraints' => [new NotBLank(),],
                'label' => 'Email de la personne à contacter : ',
            ])
            ->add('address', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Length(['min' => 3, 'max' => 255,]),
                ],
                'label' => 'Adresse de l\'entreprise : ',
            ])
            ->add('zipCode', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Regex(['pattern' => '/^[0-9]+$/']),
                    new Length(['min' => 5, 'max' => 5,]),
                ],
                'label' => 'Code postal : ',
            ])
            ->add('city', TextType::class, [
                'constraints' => [
                    new NotBLank(),
                    new Length(['min' => 1, 'max' => 255,]),
                ],
                'label' => 'Ville : ',
            ])
            ->add('workforce', IntegerType::class, [
                'constraints' => [new NotBLank(), new Positive(),],
                'label' => 'Effectif de l\'entreprise : ',
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [new Length(['max' => 1000,]),],
                'required' => false,
                'label' => 'Avez-vous un message à ajouter? ',
            ])
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
