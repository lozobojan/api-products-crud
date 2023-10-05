<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Product::class);
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StoreProductRequest $request): ProductResource
    {
        $this->authorize('create', Product::class);
        return new ProductResource(
            Product::query()->create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(Product $product): ProductResource
    {
        $this->authorize('view', $product);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(UpdateProductRequest $request, Product $product): int
    {
        $this->authorize('update', $product);
        return Product::query()->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Product $product): ?bool
    {
        $this->authorize('delete', $product);
        return $product->delete();
    }
}
