<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/{id}/game", name="game_show" )
     */
    public function gameShow(Game $game)
    {
        return $this->render('game/show.html.twig', [
            'game' => $game
        ]);
    }
}
