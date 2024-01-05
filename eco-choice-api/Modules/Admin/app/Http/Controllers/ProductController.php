<?php

namespace Modules\Admin\App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Admin\App\Http\Requests\CreateProductRequest;
use Modules\Admin\App\Http\Requests\DeleteProductRequest;
use Modules\Admin\App\Http\Requests\GetAllProductsRequest;
use Modules\Admin\App\Http\Requests\GetProductRequest;
use Modules\Admin\App\Http\Requests\UpdateProductRequest;
use Modules\Admin\App\Services\AdminProductService;

class ProductController extends Controller
{

    public function __construct(protected AdminProductService $service)
    {
        $this->middleware('auth:api', ['except' => ['getAll', 'get']]);
    }

    public function create(CreateProductRequest $request): JsonResponse
    {
        $this->service->create($request->toArray());

        return response()->json([
            'message' => 'Successfully created',
        ]);
    }

    public function get(GetProductRequest $request): JsonResponse
    {
        $product = $this->service->get($request->input('product_id'));
        return response()->json([
            'status' => 'Successfully retrieved',
            'product' => $product
        ]);
    }

    public function getAll($request): JsonResponse
    {
        $products = $this->service->getAll();
        return response()->json([
            'status' => 'Successfully retrieved',
            'products' => $products
        ]);
    }

    public function update(UpdateProductRequest $request): JsonResponse
    {
        $this->service->update($request->toArray(), $request->input('product_id'));
        return response()->json([
            'status' => 'Successfully updated!'
        ]);
    }

    public function delete(DeleteProductRequest $request): JsonResponse
    {
        $this->service->delete($request->input('product_id'));
        return response()->json([
            'message' => 'Successfully deleted!'
        ]);
    }

}
