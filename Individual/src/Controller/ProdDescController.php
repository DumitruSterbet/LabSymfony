<?php

namespace App\Controller;

use App\Entity\ProdDesc;
use App\Form\ProdDesc1Type;
use App\Repository\ProdDescRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prod/descriere")
 */
class ProdDescController extends AbstractController
{
    /**
     * @Route("/", name="prod_desc_index", methods={"GET"})
     */
    public function index(ProdDescRepository $prodDescRepository): Response
    {
        return $this->render('prod_desc/index.html.twig', [
            'prod_descs' => $prodDescRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="prod_desc_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $prodDesc = new ProdDesc();
        $form = $this->createForm(ProdDesc1Type::class, $prodDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prodDesc);
            $entityManager->flush();

            return $this->redirectToRoute('prod_desc_index');
        }

        return $this->render('prod_desc/new.html.twig', [
            'prod_desc' => $prodDesc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prod_desc_show", methods={"GET"})
     */
    public function show(ProdDesc $prodDesc): Response
    {
        return $this->render('prod_desc/show.html.twig', [
            'prod_desc' => $prodDesc,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prod_desc_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProdDesc $prodDesc): Response
    {
        $form = $this->createForm(ProdDesc1Type::class, $prodDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prod_desc_index');
        }

        return $this->render('prod_desc/edit.html.twig', [
            'prod_desc' => $prodDesc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prod_desc_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProdDesc $prodDesc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prodDesc->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prodDesc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prod_desc_index');
    }
}
