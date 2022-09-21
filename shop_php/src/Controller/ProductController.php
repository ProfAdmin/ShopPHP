<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/product/{productId}', name: 'app_product')]
    public function index($productId): Response
    {
        $product = $this->doctrine->getRepository(Product::class)->find($productId);
        $urlHomePage = $this->generateUrl('app_home');

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
            'urlHomePage' => $urlHomePage
        ]);
    }

    #[Route('/product/show_by_category/{categoryId}', name: 'product_show_by_category')]
    public function showByCategory($categoryId)
    {
        $products = $this->doctrine->getRepository(Product::class)->findBy(['categoryId' => $categoryId]);

        return $this->render('product/show_products.html.twig', [
            'controller_name' => 'product_show_by_category',
            'products' => $products
        ]);
    }
}
