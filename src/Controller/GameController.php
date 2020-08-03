<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Service\ImageUploader;
use App\Service\Slugger;
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
    private $slugger;
    

    public function __construct(GameRepository $gameRepository,EntityManagerInterface $manager, Slugger $slugger)
    {
        $this->gameRepository = $gameRepository;
        $this->manager = $manager;
        $this->slugger = $slugger;
        
    }


    /**
     * @Route("/{id}/game", name="game_show", requirements={"id":"\d+"} )
     */
    public function gameShow($id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $game = $this->gameRepository->findOneWithData($id);
        dump($game);
        return $this->render('game/show.html.twig', [
            'game' => $game
        ]);
    }




    /**
     * @Route("/add" , name="game_add")
     */
    public function add (Request $request, ImageUploader $uploder,Slugger $slugger) {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $newGame = new Game();

        $form = $this->createForm(GameType::class, $newGame);

        $form->handleRequest($request);

       
        if ($form->isSubmitted() && $form->isValid()){
            $newFilename = $uploder->saveAndMoveFile($form->get('image')->getData());

            if ($newFilename !== null) {
                $newGame->setImage($newFilename);
               
            }

            // Create slug of game title
            $slug = $slugger->slugify($newGame->getTitle());
            $newGame->setSlug($slug);

            //set User of game
            $newGame->addUser($this->getUser());
            
            $this->manager->persist($newGame);
            $this->manager->flush();

            $this->addFlash('success' ,  'Votre nouveau jeu a bien été ajouté');
            
            return $this->redirectToRoute('main');

           
        }

        return $this->render('game/add.html.twig', [
            'formView' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/game/edit/{slug}", name="game_edit")
     */
    public function edit (Request $request, Game $game, ImageUploader $uploder)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(GameType::class, $game);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $newFilename = $uploder->saveAndMoveFile($form->get('image')->getData());

            if ($newFilename !== null) {
                $game->setImage($newFilename);
               
            }

            // Create slug of game title
            $slug = $this->slugger->slugify($game->getTitle());
            $game->setSlug($slug);

            $this->addFlash('success' ,  'Votre nouveau jeu a bien été modifié');

            $this->manager->flush();

            return $this->redirectToRoute('game_show', ['id' => $game->getId()]);

        }

        return $this->render('game/edit.html.twig', [
            'formView' => $form->createView(),
            'game' => $game
        ]);

    }
}
