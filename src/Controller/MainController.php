<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{


    private $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * @Route("/", name="main")
     */
    public function index()
    {

        $games = $this->gameRepository->findAll();

        dump($games);
        return $this->render('main/index.html.twig', [
            'games' => $games,
        ]);
    }
}
