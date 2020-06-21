<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{

    private $gameRepository;
    private $manager;

    public function __construct(GameRepository $gameRepository,EntityManagerInterface $manager)
    {
        $this->gameRepository = $gameRepository;
        $this->manager = $manager;
    }


    /**
     * @Route("/{id}/game", name="game_show" )
     */
    public function gameShow($id)
    {
        $game = $this->gameRepository->findOneWithData($id);
        return $this->render('game/show.html.twig', [
            'game' => $game
        ]);
    }
}
