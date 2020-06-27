<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,[
                'label' => 'Nom de la nouvelle catégorie'
            ])
            ->add('description',TextareaType::class ,[
                'label' => 'Description de la nouvelle catégorie'
            ])
            
            ->add('games', EntityType::class,[
                'class' => Game::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' =>  true,
                'by_reference' => false 
                ])
           
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
