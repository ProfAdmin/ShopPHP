<?php

namespace App\UI\Controller;

use App\BLL\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowProductController extends AbstractController
{
    public function __construct(
        private ProductService $productService
    ) {
    }

    #[Route('/product/{productId}', name: 'app_product')]
    public function index($productId): Response
    {
        $product = $this->productService->getById($productId);
        $urlHomePage = $this->generateUrl('app_home');

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
            'urlHomePage' => $urlHomePage
        ]);
    }
}
