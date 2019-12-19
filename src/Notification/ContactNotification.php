<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {


 /*
  * @var \Swift_Mailer
  *
  */
  private $mailer;

  /*
   * @var Environment
   *
   */
   private $renderer;




public function __construct(\Swift_Mailer $mailer, Environment $renderer){
  $this->mailer=$mailer;
  $this->renderer = $renderer;
}

public function notify(Contact $contact){ /*Cette fonction permet d'envoyer un mail à un adresse précise*/
  $message = (new \Swift_Message ('La Braise Dorée : ' . $contact->getSubject() ))
    ->setFrom($contact->getEmail()) /*On récupère l'email inscrite par l'utilisateur */
    ->setTo('Tom.Cermelli91@gmail.com') /*On envoie le mail à cette adresse, ici celle de l'entreprise*/
    ->setReplyTo($contact->getEmail()); /*On peut renvoyer un message à l'adresse mail qui nous a envoyé le message*/

  $this->mailer->send($message);


}

}
