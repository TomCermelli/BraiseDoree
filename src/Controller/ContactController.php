<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/contact")
*/
class ContactController extends AbstractController
{
  /**
  * @Route("/", name="contact_index", methods={"GET", "POST"})
  */

  public function index(Request $request)
  {
    $contact = new Contact();
    $form = $this->createForm(ContactType::class, $contact); /*On crée un formulaire sous le modèle de ContactType et on lui envoie l'object contact*/
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) { /*Si le formulaire et soumis et valide, la fonction se lance*/

      $to    = "Tom.Cermelli91@gmail.com";
      $from  = $contact->getEmail();

      ini_set("SMTP", "smtp.labraisedoree.fr");

      $message = $contact->getMessage();
      $prenom= $contact->getFirstname();
      $nom = $contact->getLastname();
      $JOUR  = date("d-m-Y");
      $HEURE = date("H:i");



      $Subject = " - $JOUR $HEURE";


      $mail_Data = "";
      $mail_Data .= "<html> \n";
      $mail_Data .= "<head> \n";
      $mail_Data .= "<title> Subject </title> \n";
      $mail_Data .= "</head> \n";
      $mail_Data .= "<body> \n";
      $mail_Data .= "Sujet du message : <b>$Subject </b> <br> \n";
      $mail_Data .= " De: $from <br> $nom $prenom\n";
      $mail_Data .= "<br> \n";
      $mail_Data .= " $message  <br> \n";
      $mail_Data .= "</body> \n";
      $mail_Data .= "</HTML> \n";

      $headers  = "MIME-Version: 1.0 \n";
      $headers .= "Content-type: text/html; charset=utf-8 \n";
      $headers .= "From: $from  \n";
      $headers .= "Disposition-Notification-To: $from  \n";
      $headers .= "X-Priority: 1  \n";
      $headers .= "X-MSMail-Priority: High \n";

      $CR_Mail = TRUE;
      $CR_Mail = @mail ($to, $Subject, $mail_Data, $headers);

      $this->addFlash(
        'success',
        "Votre message a bien été envoyée !"
      );
    }

    return $this->render('contact/index.html.twig', [
      'controller_name' => 'ContactController',
      'form' => $form->createView(),
    ]);
  }
}
