<?php

namespace App\UI\Controller;

use App\BLL\Service\ProductService;
use App\UI\Form\AddProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAddProductController extends AbstractController
{
    public function __construct(
        private ProductService $productService
    ) {
    }

    #[Route('/product/addForm', name: 'app_form_add_product')]
    public function addForm(Request $request): Response
    {
        $form = $this->createForm(AddProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $product = $form->getData();
            $this->productService->add($product);

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
