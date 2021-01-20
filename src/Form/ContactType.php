<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\DataClass\Contact;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Nom complet : ',
            ])

            ->add('businessName', TextType::class, [
                'label' => 'Raison sociale de votre entreprise (facultatif) : ',
                'required' => false,
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email : ',
            ])

            ->add('telephone', TelType::class, [
                'label' => 'Numéro de téléphone (facultatif) : ',
                'required' => false,
            ])

            ->add('subject', TextType::class, [
                'label' => 'Objet de votre demande : ',
            ])

            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Votre message : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
