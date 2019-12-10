<?php

namespace App\Controller;

use App\Entity\Formula;
use App\Form\FormulaType;
use App\Repository\FormulaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/formula")
 */
class FormulaController extends AbstractController
{

     /**
      * @Route("/", name="formula_index", methods={"GET"})
      */
     public function index(FormulaRepository $formulaRepository): Response
     {
       return $this->render('formula/index.html.twig', [
           'formulas' => $formulaRepository->findAll(),
       ]);
     }

    /**
     * @Route("/new", name="formula_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formula = new Formula();
        $form = $this->createForm(FormulaType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formula);
            $entityManager->flush();

            return $this->redirectToRoute('formula_index');
        }

        return $this->render('formula/new.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formula_show", methods={"GET"})
     */
    public function show(Formula $formula): Response
    {
        return $this->render('formula/show.html.twig', [
            'formula' => $formula,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="formula_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Formula $formula): Response
    {
        $form = $this->createForm(FormulaType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formula_index');
        }

        return $this->render('formula/edit.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formula_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Formula $formula): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formula->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('formula_index');
    }
}
