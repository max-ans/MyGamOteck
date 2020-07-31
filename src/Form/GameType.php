<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Game;
use App\Entity\Support;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null ,
            [
                'label' => 'Nom du Jeu'
            ])
            ->add('description', TextareaType::class, 
            [
                'label' => 'Description du jeux'
            ])
            ->add('image', FileType::class,
            [ 
                'label' => 'Uploader une image du jeu',
                'data_class' => null,
            ] )
            ->add('note', IntegerType::class , 
            [
                'label' => 'Note sur 10',
                'attr' => [
                    'placeholder' => '1 étant la plus mauvaise note et 10 la meilleur'
                ]
            ])
            ->add('insertedAt', DateType::class, 
            [
                'label' => 'Depuis quand avez vous le jeu',
                'widget' => 'single_text'
            ] )
            ->add('supports', EntityType::class, 
            [
                'class' => Support::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'label' => 'Support(s)'

            ])
            ->add('categories', EntityType::class,
            [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
                'label' => 'Catégorie(s)'

            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
