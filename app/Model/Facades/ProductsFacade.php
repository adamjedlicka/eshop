<?php

namespace App\Model\Facades;

use App\Model\Entities\Product;
use App\Model\Repositories\ProductRepository;
use Exception;
use Tracy\Debugger;

class ProductsFacade
{
    private ProductRepository $productRepository;

    public function __construct(
        ProductRepository $productRepository,
    ) {
        $this->productRepository = $productRepository;
    }

    public function getProduct(int $id): Product
    {
        return $this->productRepository->find($id);
    }

    public function getProductBySlug(string $slug): Product
    {
        return $this->productRepository->findBy(['slug' => $slug]);
    }

    public function findProducts(array $params = null, int $offset = null, int $limit = null): array
    {
        return $this->productRepository->findAllBy($params, $offset, $limit);
    }

    public function saveProduct(Product $product): bool
    {
        return (bool)$this->productRepository->persist($product);
    }

    public function deleteProduct(Product $product): bool
    {
        try {
            return (bool)$this->productRepository->delete($product);
        } catch (Exception $e) {
            Debugger::log($e);
            return false;
        }
    }
}
