<?php


namespace App\Application\ApplicationService;


use App\Application\Patterns\PipeLine;
use App\Application\State\Product\FillProduct;
use App\Application\State\Product\IsProductTypeNormal;
use App\Application\State\Product\IsProductTypeRegrigrator;
use App\Application\State\Product\SaveProduct;
use App\Mocks\FakeRepository;

class UpdateProduct
{

    /**
     * @var FakeRepository
     */
    private $repo;

    /**
     * UpdateProduct constructor.
     * @param UpdateProductRequest $productRequest
     */
    private $productRequest;

    public function __construct(UpdateProductRequest $productRequest, FakeRepository $fakeRepository)
    {
        $this->productRequest = $productRequest;
        $this->repo = $fakeRepository;
    }


    public function updateTypeOfProduct()
    {
        $pipelineService = new OilService(new PipeLine());

        $pipelineService->add(new FillProduct());
        $pipelineService->add(new IsProductTypeNormal());
        $pipelineService->add(new IsProductTypeRegrigrator());
        $pipelineService->add(new SaveProduct());
        $pipelineService->run([
            'productRequest' => $this->productRequest,
            'repo' => $this->repo
        ]);
    }
}
