<?php

namespace App\Form;

use App\Entity\RefillStation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class RefillStationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la borne : ',
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description de la borne : ',
            ])

            ->add('debit', IntegerType::class, [
                'label' => 'Débit de la borne : ',
            ])

            ->add('installation', ChoiceType::class, [
                'choices' => [
                    'Intérieur' => 'Intérieur',
                    'Extérieur' => 'Intérieur',
                    'Les deux' => 'Les deux'
                ],
                'label' => 'Choix de l\'installation : ',
                'expanded' => true,
            ])

            ->add('refillTime', IntegerType::class, [
                'label' => 'Temps de recharge : ',
            ])

            ->add('additionalStorage', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => 'Stockage supplémentaire? ',
                'expanded' => true,
            ])

            ->add('photo', UrlType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RefillStation::class,
        ]);
    }
}
