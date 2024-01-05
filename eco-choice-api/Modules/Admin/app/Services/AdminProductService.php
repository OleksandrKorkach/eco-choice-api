<?php

namespace Modules\Admin\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\App\Models\Product;

class AdminProductService
{

    public function get($productId): array|Collection
    {
        return Product::query()->where('id', $productId)->get();
    }

    public function getAll(): array
    {
        return Product::query()->paginate(10)->items();
    }

    public function create(array $product): void
    {
        Product::query()->create($product);
    }

    public function update(array $updatedFields, $productId): void
    {
        $filteredFields = array_filter($updatedFields, fn ($value) => $value !== null);
        Product::query()
            ->find($productId)
            ->update($filteredFields);
    }

    public function delete(int $productId): void
    {
        Product::query()
            ->find($productId)
            ->delete();
    }
}
