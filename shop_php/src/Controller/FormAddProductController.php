<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;

class FormAddProductController extends AbstractController
{
    #[Route('/product/addForm', name: 'app_form_add_product')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $doctrine->getManager();
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();

            $urlHomePage = $this->generateUrl('app_home');
            $urlAddProduct = $this->generateUrl('app_form_add_product');

            return $this->render('form_add_product/result.html.twig', [
                'controller_name' => 'FormAddProductController',
                'urlHomePage' => $urlHomePage,
                'urlAddProduct' => $urlAddProduct
            ]);
        }

        return $this->render('form_add_product/index.html.twig', [
            'controller_name' => 'FormAddProductController',
            'form' => $form->createView()
        ]);
    }
}
