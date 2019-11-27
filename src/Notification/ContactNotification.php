<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

public function __construct(\Swift_Mailer $mailer, Environment $renderer){
  $this->mailer=$mailer;
  $this->renderer = $renderer;
}

public function notify(Contact $contact){ /*Cette fonction permet d'envoyer un mail à un adresse précise*/
  $message = (new \Swift_Message ('La Braise Dorée : ' . $contact->getSubject() ))
    ->setFrom($contact->getEmail()) /*On récupère l'email inscrite par l'utilisateur */
    ->setTo('Tom.Cermelli91@gmail.com') /*On envoie le mail à cette adresse, ici celle de l'entreprise*/
    ->setReplyTo($contact->getEmail()) /*On peut renvoyer un message à l'adresse mail qui nous a envoyé le message*/
    /*le setBody nous permet de donnée un template au message que l'on recoit */
    ->setBody($this->renderer->render('email/contact.html.twig' , [
      'contact' => $contact
    ]),
    'text/html'
  );
  $this->mailer->send($message);


}

}
