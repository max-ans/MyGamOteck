<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', null, [
                'label' => 'Nom',
            ])
            ->add('firstname', null, [
                'label' => 'Prénom'
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'required' => true
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Message'
            ])
            ->add('terms', CheckboxType::class, [
                'label' => 'J\'accepte d\'être contacter par le développeur de ce site '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
