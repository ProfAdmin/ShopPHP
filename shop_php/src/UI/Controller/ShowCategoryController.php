<?php

namespace App\UI\Controller;

use App\BLL\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowCategoryController extends AbstractController
{
    public function __construct(
        private CategoryService $categoryService
    ) {
    }

    #[Route('/category', name: 'app_category')]
    public function showAll(): Response
    {
        $categories = $this->categoryService->getAll();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categories
        ]);
    }
}
