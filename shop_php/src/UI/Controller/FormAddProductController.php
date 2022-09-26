<?php

namespace App\UI\Controller;

use App\BLL\Service\ProductService;
use App\UI\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAddProductController extends AbstractController
{
    public function __construct(
        private RequestStack $requestStack,
        private ProductService $productService
    ) {
    }

    #[Route('/product/addForm', name: 'app_form_add_product')]
    public function addForm(): Response
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($this->requestStack->getCurrentRequest());

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
