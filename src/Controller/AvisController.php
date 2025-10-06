<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Avis;
use App\Entity\Plat;
use App\Form\AvisType;

final class AvisController extends AbstractController
{
    #[Route('/avis/{id}', name: 'app_avis')]
    public function index(Plat $plat,Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirectToRoute('app_avis', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'plat' => $plat,
            'form' => $form,
        ]);
    }
}
