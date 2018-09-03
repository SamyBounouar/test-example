<?php
namespace App\Repository;

use App\Api\ApiClient;
use App\Model\Product;
use App\Model\Supplier;
use App\Utils\TextHelper;

/**
 * Class ProductRepository
 * @package App\Repository
 */
class ProductRepository
{

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * ProductRepository constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @param string $idProduct
     * @return Product
     */
    public function getProductDetail(string $idProduct): Product
    {
        $detailResponse = $this->apiClient->get('info?id=' . $idProduct);
        $productData = $detailResponse->$idProduct;
        $suppliers = $this->loadSuppliers($productData);
        $product = $this->loadProducts($idProduct, $productData, $suppliers);

        return $product;
    }

    /**
     * @param string $id
     * @param \stdClass $productData
     * @param array $suppliers
     * @return Product
     */
    public function loadProducts(string $id, \stdClass $productData, array $suppliers): Product
    {
        $textHelper = new TextHelper();
        return (new Product())
            ->setId($id)
            ->setName($textHelper->sanitize($productData->name ?? ''))
            ->setDescription($textHelper->sanitize($productData->description ?? ''))
            ->setType($textHelper->sanitize($productData->type ?? ''))
            ->setSuppliers($suppliers);
    }

    /**
     * @param \stdClass $productData
     * @return array
     */
    public function loadSuppliers(\stdClass $productData): array
    {
        $suppliersData = $productData->suppliers ?? [];
        $textHelper = new TextHelper();
        $suppliers = [];
        if (count($suppliersData)) {
            foreach ($suppliersData as $supplier) {
                $suppliers[] = (new Supplier())->setName($textHelper->sanitize($supplier));
            }
        }

        return $suppliers;
    }

    /**
     * @return array
     */
    public function getAvailableProducts(): array
    {
        $productsResponse = $this->apiClient->get('list');
        $products = [];
        foreach ($productsResponse->products as $id => $name) {
            $products[] = $this->getProductDetail($id);
        }

        return $products;
    }
}
