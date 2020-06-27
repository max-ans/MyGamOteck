<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    private $categoryRepository;
    private $manager;
    

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $manager)
    {   
        $this->categoryRepository = $categoryRepository;
        $this->manager = $manager;
                
    }



    /**
     * @Route("/category", name="category")
     */
    public function list()
    {
        $allCategories = $this->categoryRepository->findAll();

        return $this->render('category/list.html.twig', [
            'allCategories' => $allCategories ,
        ]);
    }

    
}
