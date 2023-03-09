<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductService
{
    public function store(ProductRequest $request): Product
    {
        $data = $request->validated();
        $dataCategories = $data['categories'];
        $dataImages = $data['images'];

        unset($data['categories']);
        unset($data['images']);

        $product = Product::create($data);

        $product->categories()->attach($dataCategories);
        $product->images()->attach($dataImages);

        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product): Product
    {
        $data = $request->validated();

        if (array_key_exists('categories', $data)) {
            $dataCategories = $data['categories'];
            $product->categories()->sync($dataCategories);
            unset($data['categories']);
        }

        if (array_key_exists('images', $data)) {
            $dataImages = $data['images'];
            $product->images()->sync($dataImages);
            unset($data['images']);
        }

        $product->update($data);

        return $product;
    }
}
