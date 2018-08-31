<?php
namespace App;

use App\Api\ApiClient;
use App\Model\Product;
use App\Repository\ProductRepository;

class ListProducts {
    public function run() {
        $apiClient = new ApiClient();
        $productRepository = new ProductRepository($apiClient);

        $products = $productRepository->getAvailableProducts();

        $productsToRender = [];
        /** @var Product $product */
        foreach ($products as $product) {
            $productsToRender[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'type' => $product->getType(),
                'suppliers' => array_map(
                    function ($supplier) {
                        return $supplier->getName();
                    },
                    $product->getSuppliers()
                )
            ];
        }

        return $productsToRender;
    }
}