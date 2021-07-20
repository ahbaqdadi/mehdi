<?php


namespace App\Http\Controllers;


use App\Application\ApplicationService\UpdateProduct;
use App\Application\DTO\Product\UpdateProductRequest;
use App\Mocks\FakeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class DefaultController
{
    /**
     * @var FakeRepository
     */
    private $repo;

    public function __construct(FakeRepository $fakeRepository)
    {
        $this->repo = $fakeRepository;
    }

    public function index(Request $request)
    {
        $request = UpdateProductRequest::fromLaravelRequest($request);

        $success = true;
        // Presenter
        try {
            $updateProduct = new UpdateProduct($request);
            $updateProduct->updateTypeOfProduct();
        } catch (\Exception $exception) {
            $success = false;
        }

        return $success;
    }
}
