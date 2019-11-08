<?php

namespace App\Notification;

use App\Entity\Contact;

class ContactNotification {

  /**
   *@var \Swift_Mailer
   */
   private $mailer;

   /**
    *@var Environnement
    */
    private $renderer;



  public function __construct(\Swift_Mailer $mailer, Environnement $renderer){

    $this->mailer = $mailer;
    $this->renderer = $renderer;
  }

  public function notify(Contact $contact) {
    $message = (new \Swift_Message('Agence : ' . $contact->getEmail() ) )
      ->setFrom( 'noreply@server.com')
      ->setTo('Tom.Cermelli91@gmail.com') /*à quelle adresse on l'envoie*/
      ->setReplyTo($contact->getEmail()) /*on récupère l'adresse rentré par l'utilisateur*/
      -setBody($this->renderer->render('emails/contact.html.twig', [
        'contact'=>contact
      ]));
      $this->mailer->send($message);

  }

}
