<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ManagerRegistry $registry): Response
    {
        $recipeRepository = new RecipeRepository($registry);

        return $this->render('index/index.html.twig', [
            'title' => 'Acceuil',
            'recipes' => $recipeRepository->findAll()
        ]);
    }
}
