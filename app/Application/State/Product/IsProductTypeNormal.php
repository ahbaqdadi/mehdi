<?php


namespace App\Application\State\Product;


use App\Application\DTO\Product\UpdateProductRequest;
use App\Mocks\Product;

class IsProductTypeNormal
{
    public function __invoke($payload)
    {
        /**
         * @var UpdateProductRequest $productRequest
         */
        $productRequest = $payload['productRequest'];

        if ($productRequest->type() == 'normal') {
            Log::debug('Product is of type: normal');
        }

        return $payload;
    }
}
