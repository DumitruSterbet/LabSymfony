<?php

namespace App\Controller;

use App\Entity\TaraProd;
use App\Form\TaraProd1Type;
use App\Repository\TaraProdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tara/prod")
 */
class TaraProdController extends AbstractController
{
    /**
     * @Route("/", name="tara_prod_index", methods={"GET"})
     */
    public function index(TaraProdRepository $taraProdRepository): Response
    {
        return $this->render('tara_prod/index.html.twig', [
            'tara_prods' => $taraProdRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tara_prod_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $taraProd = new TaraProd();
        $form = $this->createForm(TaraProd1Type::class, $taraProd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($taraProd);
            $entityManager->flush();

            return $this->redirectToRoute('tara_prod_index');
        }

        return $this->render('tara_prod/new.html.twig', [
            'tara_prod' => $taraProd,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tara_prod_show", methods={"GET"})
     */
    public function show(TaraProd $taraProd): Response
    {
        return $this->render('tara_prod/show.html.twig', [
            'tara_prod' => $taraProd,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tara_prod_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TaraProd $taraProd): Response
    {
        $form = $this->createForm(TaraProd1Type::class, $taraProd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tara_prod_index');
        }

        return $this->render('tara_prod/edit.html.twig', [
            'tara_prod' => $taraProd,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tara_prod_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TaraProd $taraProd): Response
    {
        if ($this->isCsrfTokenValid('delete'.$taraProd->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($taraProd);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tara_prod_index');
    }
}
