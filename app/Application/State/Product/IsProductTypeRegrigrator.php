<?php


namespace App\Application\State\Product;


use App\Application\DTO\Product\UpdateProductRequest;
use App\Mocks\Product;

class IsProductTypeRegrigrator
{
    public function __invoke($payload)
    {
        /**
         * @var UpdateProductRequest $productRequest
         */
        $productRequest = $payload['productRequest'];
        /**
         * @var Product $product
         */
        $product = $payload['product'];

        if ($productRequest->type() == 'refrigerator') {
            Log::debug('Product is of type: refrigerator');
            $product->isRefrigirator = true;
        }

        $payload['product'] = $product;

        return $payload;
    }
}
