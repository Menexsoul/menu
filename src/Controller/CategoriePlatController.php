<?php

namespace App\Controller;

use App\Entity\CategoriePlat;
use App\Form\CategoriePlatType;
use App\Repository\CategoriePlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorie/plat')]
final class CategoriePlatController extends AbstractController
{
    #[Route(name: 'app_categorie_plat_index', methods: ['GET'])]
    public function index(CategoriePlatRepository $categoriePlatRepository): Response
    {
        return $this->render('categorie_plat/index.html.twig', [
            'categorie_plats' => $categoriePlatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_plat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categoriePlat = new CategoriePlat();
        $form = $this->createForm(CategoriePlatType::class, $categoriePlat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categoriePlat);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_plat/new.html.twig', [
            'categorie_plat' => $categoriePlat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_plat_show', methods: ['GET'])]
    public function show(CategoriePlat $categoriePlat): Response
    {
        return $this->render('categorie_plat/show.html.twig', [
            'categorie_plat' => $categoriePlat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_plat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategoriePlat $categoriePlat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoriePlatType::class, $categoriePlat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_plat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_plat/edit.html.twig', [
            'categorie_plat' => $categoriePlat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_plat_delete', methods: ['POST'])]
    public function delete(Request $request, CategoriePlat $categoriePlat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriePlat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($categoriePlat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorie_plat_index', [], Response::HTTP_SEE_OTHER);
    }
}
