<?php

namespace App\Application\DTO\Product;
use Illuminate\Http\Request;

final class UpdateProductRequest
{
    private  $productName;
    private  $quantity;
    private  $price;
    private  $type;

    private function __construct($productName, $quantity, $price, $type)
    {
        $this->type = $type;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->productName = $productName;
    }

    public static function fromLaravelRequest(Request $request)
    {
        return new static(
            $request->query->get('name'),
            $request->query->get('quantity'),
            $request->query->get('price'),
            $request->query->get('type')
        );
    }


    public function productName()
    {
        return $this->productName;
    }

    public function quantity()
    {
        return $this->quantity;
    }

    public function type()
    {
        return $this->type;
    }

    public function price()
    {
        return $this->price;
    }
}
