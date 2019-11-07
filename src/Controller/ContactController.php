<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContacType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
  /**
  * @Route("/contact", name="contact")
  */
  public function index()
  {
    $contact = new Contact();
    $form = $this->createForm(ContactType::class, $contact);
    return $this->render('contact/index.html.twig', [
      'controller_name' => 'ContactController',
      'form' => $form->createView()
    ]);
  }
}
