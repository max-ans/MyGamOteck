<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

 
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        for ($indexGame = 0; $indexGame < 11; $indexGame++){
            $game = new Game();
            $game->setTitle($faker->word());
            $game->setDescription($faker->realText());
            $game->setImage($faker->imageUrl(100,150,));
            $game->setNote($faker->randomDigitNotNull());
            $game->setInsertedAt(new \DateTime($faker->date()));

            $manager->persist($game);
            
        }

        $manager->flush();
    }
}
