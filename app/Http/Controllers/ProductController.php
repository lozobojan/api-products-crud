<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): Collection
    {
        $this->authorize('viewAny', Product::class);
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StoreProductRequest $request): Model|Builder
    {
        $this->authorize('create', Product::class);
        return Product::query()->create($request->validated());
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(Product $product): Product
    {
        $this->authorize('view', $product);
        return $product;
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
