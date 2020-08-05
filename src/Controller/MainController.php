<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/home" , name="home")
     */
    public function home()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // recovery user
        $user = $this->getUser();

        $games = $this->gameRepository->findAllByUser($user->getId());

        return $this->render('main/home.html.twig', [
            'games' => $games,
        ]);
    }

     /**
     * @Route("/gamoteck" , name="gamoteck")
     */
    public function gamoteck()
    {
        return $this->render('main/gamoteck.html.twig');
    }

    /**
     * @Route("/contact" , name="contact")
     */
    public function contact(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

        }

        return $this->render('main/contact.html.twig',[
           'form' => $form->createView() 
        ]);

    }
}
