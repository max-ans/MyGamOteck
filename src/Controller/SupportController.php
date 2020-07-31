<?php

namespace App\Controller;

use App\Entity\Support;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SupportController extends AbstractController
{
    /**
     * @Route("/support/{slug}", name="support")
     */
    public function showBySupport(Support $support)
    {

        $gameBySupport = $support->getGames();

        return $this->render('support/show.html.twig', [
            'support' => $support,
            'games' => $gameBySupport
        ]);
    }
}
