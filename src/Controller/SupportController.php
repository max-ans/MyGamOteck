<?php

namespace App\Controller;

use App\Entity\Support;
use App\Repository\SupportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SupportController extends AbstractController
{
    /**
     * @Route("/support/{slug}", name="support")
     */
    public function showBySupport(Support $support, SupportRepository $supportRepository)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


        $gameBySupport = $supportRepository->findGamesByUserAndSupport($this->getUser()->getId(), $support->getId());

        // dd($gameBySupport);
        return $this->render('support/show.html.twig', [
            'support' => $gameBySupport,
         
        ]);
    }
}
