<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
     public function index(ProduitRepository $produitRepository): Response
     {
         return $this->render('produit/index.html.twig', [
             'red_pizza' => $produitRepository->findAll(),
             'white_pizza' => $produitRepository->findAll(),
             'other_pizza' => $produitRepository->findAll(),
         ]);
     }
}
