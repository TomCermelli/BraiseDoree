<?php
namespace App\Controller;

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\DrinkRepository;
use App\Repository\PizzaRepository;
use App\Repository\OtherProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
* @Route("/pdf", name="pdf")
*/
class PDFController extends AbstractController
{
  /**
  * @Route("/", name="pdf_index", methods={"GET"})
  */
  public function index(\Knp\Snappy\Pdf $snappy ,Request $request,PizzaRepository $pizzaRepository, DrinkRepository $drinkRepository, OtherProductRepository $autreProduitRepository ): Response
  {

    /*le $html représente la vue que nous allons afficher dans le pdf*/
    $html = $this->renderView('pdf/index.html.twig', [
        'pizzas' => $pizzaRepository->findAll(), // permet de récupérer les pizzas
        'lasagne' => $autreProduitRepository->findByLasagne(), //On récupère toute les lasagnes
        'ciabatta' => $autreProduitRepository->findByCiabatta(), //On récupère toute les ciabattas
        'dessert' => $autreProduitRepository->findByDessert(), //On récupère tout les désserts
        'drinks' => $drinkRepository->findAll(), //On récupère toute les données des boissons


    ]);

    /*Le nom du PDF*/
    $filename = "LaBraiseDorée_Produit";



    return new Response (
      $snappy->getOutputFromHtml($html),
      // ok status code
      200,
      array(
        'Content-Type' =>'application/pdf',
        'Contet-Disposition' => sprintf('attachment; filename="'.$filename.'.pdf"')
      )
    );
  }
}
