<?php

namespace App\Controller;

use App\Repository\PizzaRepository;
use App\Repository\DrinkRepository;
use App\Repository\OtherProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
     public function index(PizzaRepository $pizzaRepository, DrinkRepository $drinkRepository, OtherProductRepository $autreProduitRepository): Response
     {

         return $this->render('produit/index.html.twig', [
             'red_pizza' => $pizzaRepository->findByRedPizza(), // permet de récupérer uniquement les pizzas rouges
             'white_pizza' => $pizzaRepository->findByWhitePizza(), // permet de récupérer uniquement les pizzas blanches
             'other_pizza' => $pizzaRepository->findByOtherPizza(), // permet de récupérer les pizza qui ne sont ni blanche ni rouge (pizza nutella)
             'drinks' => $drinkRepository->findAll(), //On récupère toute les données des boissons
             'lasagne' => $autreProduitRepository->findByLasagne(), //On récupère toute les lasagnes
             'ciabatta' => $autreProduitRepository->findByCiabatta(), //On récupère toute les ciabattas
             'dessert' => $autreProduitRepository->findByDessert(), //On récupère tout les désserts
         ]);
     }
}
