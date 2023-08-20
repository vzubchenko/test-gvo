<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/api/products", name="api_products_list", methods={"GET"})
     */
    public function productList(): JsonResponse
    {
        $products =  $this->productRepository->findAll();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        }

        return $this->json($data);
    }

    /**
     * @Route("/api/products/{id}", name="api_product_details", methods={"GET"})
     */
    public function productDetails($id): JsonResponse
    {
        $productSales = $this->productRepository->getSalesDataForProduct($id);

        if (!$productSales) {
            return $this->json(['message' => 'Product not found'], 404);
        }

        return $this->json($productSales);
    }
}
