<?php


namespace App\Application\State\Product;


use App\Application\DTO\Product\UpdateProductRequest;
use App\Mocks\FakeRepository;
use App\Mocks\Product;

class SaveProduct
{
    public function __invoke($payload)
    {
        $product = $payload['product'];

        $product->save();
    }
}
