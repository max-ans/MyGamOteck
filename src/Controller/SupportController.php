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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


        $gameBySupport = $support->getGames();

        return $this->render('support/show.html.twig', [
            'support' => $support,
            'games' => $gameBySupport
        ]);
    }
}
