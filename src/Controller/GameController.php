<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Service\ImageUploader;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
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
        dump($game);
        return $this->render('game/show.html.twig', [
            'game' => $game
        ]);
    }


    /**
     * @Route("/add" , name="game_add")
     */
    public function add (Request $request, ImageUploader $uploder) {

        $newGame = new Game();

        $form = $this->createForm(GameType::class, $newGame);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $newFilename = $uploder->saveAndMoveFile($form->get('image')->getData());

       
            if ($newFilename !== null) {
                $newGame->setImage($newFilename);
               
            }

           

            
            $this->manager->persist($newGame);
            $this->manager->flush();

            $this->addFlash('success' ,  'Votre nouveau jeu a bien été ajouté');
            
            return $this->redirectToRoute('main');

           
        }

        return $this->render('game/add.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
}
