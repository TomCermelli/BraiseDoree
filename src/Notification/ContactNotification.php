<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

public function __construct(\Swift_Mailer $mailer, Environment $renderer){
  $this->mailer=$mailer;
  $this->renderer = $renderer;
}

public function notify(Contact $contact){
  $message = (new \Swift_Message ('Agence : ' . $contact->getSubject() ))
    ->setFrom($contact->getEmail())
    ->setTo('Tom.Cermelli91@gmail.com')
    ->setReplyTo($contact->getEmail())
    ->setBody($this->renderer->render('email/contact.html.twig' , [
      'contact' =>$contact
    ]),
    'text/html'
  );
  $this->mailer->send($message);


}

}
