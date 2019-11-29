<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormuleController extends AbstractController
{
    /**
     * @Route("/formule", name="formule")
     */
    public function index()
    {
        return $this->render('formule/index.html.twig', [
            'controller_name' => 'FormuleController',
        ]);
    }
}
