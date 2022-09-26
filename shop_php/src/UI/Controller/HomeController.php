<?php

namespace App\UI\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $urlAddProduct = $this->generateUrl('app_form_add_product');
        $urlCategory = $this->generateUrl('app_category');
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'urlAddProduct' => $urlAddProduct,
            'urlCategory' => $urlCategory
        ]);
    }
}
