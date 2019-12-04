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
    $option = [
      'margin-top' => 0,
      'margin-right' => 0,
      'margin-bottom' => 0,
      'margin-left' => 0,
      'page-height' => 124 * 3,

    ];
    /*return new Response (
      $snappy->getOutputFromHtml($html, $option),
      // ok status code
      200,
      array(
        'Content-Type' =>'application/pdf',
        'Contet-Disposition' => sprintf('attachment; filename="'.$filename.'.pdf"')
      )
    );*/

    $pdfContents=$snappy->getOutputFromHtml($html, $option);
    // on l'envoie au navigateur
    $response=new Response($pdfContents);
    $response->headers->set('Content-type', 'application/octect-stream');
    $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', "La Braise Dorée - Carte.pdf"));
    //avec attachment on force le téléchargement à l'arriver de la page
    return $response;
  }
}
