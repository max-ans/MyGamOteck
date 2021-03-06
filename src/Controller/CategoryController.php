<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Service\Slugger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    private $categoryRepository;
    private $manager;
    private $slugger;
    

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $manager, Slugger $slugger)
    {   
        $this->categoryRepository = $categoryRepository;
        $this->manager = $manager;
        $this->slugger = $slugger;
                
    }



    /**
     * @Route("/category", name="category")
     */
    public function list()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $allCategories = $this->categoryRepository->findAll();

        return $this->render('category/list.html.twig', [
            'allCategories' => $allCategories ,
        ]);
    }
    /**
     * @Route("/category/add" , name="category_add")
     */
    public function add (Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $newCategory = new Category();

        $form = $this->createForm( CategoryType::class ,$newCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
           
            $newCategory->setSlug($this->slugger->slugify($newCategory->getName()));

            $this->manager->persist($newCategory);

            $this->manager->flush();

            $this->addFlash('success', 'La catégorie a bien été enregistée');

            return $this->redirectToRoute('category');

        }

        return $this->render('category/form.html.twig', [
            'form' => $form->createView(),
        ] );
    }

    /**
     * @Route("/category/{slug}" , name="category_show")
     */
    public function show(Category $category)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $category = $this->categoryRepository->findCategoryWithGames($category->getSlug());

        $gameListByUsers = [];

        foreach($category->getGames() as $game){

            foreach ($game->getUsers() as $user) {

                if ( $this->getUser() === $user){
                //    dump($game->getTitle() . ' est dans la liste des jeux de '. $user->getUsername());
                   $gameListByUsers[] = $game;
                }   
            }
        }
     
        return $this->render('category/show.html.twig',[
            'category' => $category,
            'games' => $gameListByUsers
        ]);
    }
    

    /**
     * @Route("/category/edit/{slug}" , name="category_edit")
     */
    public function edit(Category $category, Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm( CategoryType::class ,$category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
           
            $category->setSlug($this->slugger->slugify($category->getName()));

            

            $this->manager->flush();

            $this->addFlash('success', 'Les modifications de la catégorie a bien été enregistée');

            return $this->redirectToRoute('category');

        }

        return $this->render('category/form.html.twig', [
            'form' => $form->createView(),
            'category' => $category
        ] );
    }

    /**
     * @Route("/question/delete/{slug}" , name="category_delete")
     */
    public function delete (Category $category) 
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


        $this->manager->remove($category);

        $this->manager->flush();

        $this->addFlash('success', 'La catégorie a bien été supprimée');

        return $this->redirectToRoute('category');
    }
}
