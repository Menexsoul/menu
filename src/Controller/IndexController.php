<?php

namespace App\Controller;

use App\Repository\CategoriePlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/index/pl', name: 'app_index')]
    public function index(CategoriePlatRepository $categoriePlatRepository): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'categories' => $categoriePlatRepository->findAll(),
        ]);
    }
}
