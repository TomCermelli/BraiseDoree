<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
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

     public function index(Request $request, ContactNotification $notification)
     {
       $contact = new Contact();
       $form = $this->createForm(ContactType::class, $contact); /*On crée un formulaire sous le modèle de ContactType et on lui envoie l'object contact*/
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) { /*Si le formulaire et soumis et valide, la fonction se lance*/
      
         $notification->notify($contact);
         $this->addFlash("succes", "Votre email a bien été envoyé"); /*type succes, dans ce cas la on envoie un message à l'utilisateur*/
       }

       return $this->render('contact/index.html.twig', [
         'controller_name' => 'ContactController',
         'form' => $form->createView(),
       ]);
     }
}
