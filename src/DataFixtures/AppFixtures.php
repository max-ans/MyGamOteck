<?php

namespace App\DataFixtures;

use App\Entity\Game;
use App\Entity\Support;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

 
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
       
        
        $console = [
            'Playstation',
            'Xbox',
            'PC',    
        ];



        for ($indexConsole = 0; $indexConsole < count($console); $indexConsole++){
            $newConsole = new Support();
            $newConsole->setName($console[$indexConsole])
                       ->setEnterprise($faker->company())
                       ->setDescription($faker->realText());
                       
                       
            for ($indexGame = 0; $indexGame < 5; $indexGame++){
                $game = new Game();
                $game->setTitle($faker->word());
                $game->setDescription($faker->realText());
                $game->setImage($faker->imageUrl(100,150,));
                $game->setNote($faker->randomDigitNotNull());
                $game->setInsertedAt(new \DateTime($faker->date()));
               
                
                $manager->persist($game);
                
            }
            
            $manager->persist($newConsole);
                       
        }

        $manager->flush();
    }
}
