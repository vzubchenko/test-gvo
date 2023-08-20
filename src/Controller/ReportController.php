<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends AbstractController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/report", name="app_report")
     */
    public function index():  Response
    {
        $mostSoldProducts = $this->productRepository->findMostSoldProducts();

        return $this->render('report/index.html.twig', [
            'mostSoldProducts' => $mostSoldProducts,
        ]);
    }
}
