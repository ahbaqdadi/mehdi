<?php


namespace App\Application\State\Product;


use App\Application\DTO\Product\UpdateProductRequest;

class FillProduct
{
    public function __invoke($payload)
    {
        /**
         * @var UpdateProductRequest $productRequest
         */
        $productRequest = $payload['productRequest'];
        $repo = $payload['repo'];

        $firstUnderscore = strpos($productRequest->productName(), '_');
        $secondUnderscore = strpos($productRequest->productName(), '_', $firstUnderscore + 1);
        $id = (int) substr($productRequest->productName(), $firstUnderscore + 1, $secondUnderscore - $firstUnderscore - 1);

        $product = $repo->getProductById($id);
        $product->quantity = $productRequest->quantity();
        $product->price = $productRequest->price();

        $payload['product'] = $product;

        return $payload;
    }
}
