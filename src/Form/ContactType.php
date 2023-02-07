<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           ->add('nom', TextType::class,
                    array(
                            'label' => 'Nom ',
                            'required' => true,
                            'attr' => ['placeholder' => 'Nom du contact'],
                    ))
            ->add('prenom', TextType::class,
                    array(
                            'label' => 'Prénom ',
                            'required' => true,
                            'attr' => ['placeholder' => 'Prénom du contact'],
                    ))
            ->add('mail', EmailType::class,
                    array(
                        'label' => 'Mail ',
                        'attr' => ['placeholder' => 'Email du contact'],
                        'required'=> true,
                    ))
            ->add('message', TextType::class,
                    array(
                        'label' => 'Message ',
                        'required' => true,
                        'attr' => ['placeholder' => 'Que voulez-vous nos dire ?'],
                    ))
            ->add('Envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
