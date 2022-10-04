<?php

namespace App\UI\Controller;

use App\BLL\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowProductByCategoryController extends AbstractController
{
    public function __construct(
        private ProductService $productService
    ) {
    }

    #[Route('/product/show_by_category/{categoryId}', name: 'product_show_by_category')]
    public function showByCategory($categoryId): Response
    {
        $products = $this->productService->getByCategory($categoryId);

        return $this->render('product/show_products.html.twig', [
            'controller_name' => 'product_show_by_category',
            'products' => $products
        ]);
    }

}