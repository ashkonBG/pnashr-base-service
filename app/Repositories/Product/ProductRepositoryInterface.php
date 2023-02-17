<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface ProductRepositoryInterface
{
    /**
     * @param array $attributes
     * @param array $categories
     * @param array $creators
     * @param array $tags
     *
     * @return Model
     */
    public function createWithRelations(array $attributes, array $categories, array $creators, array $tags): Model;

    /**
     * @param int $productId
     *
     * @return Model
     * @throws ModelNotFoundException
     */
    public function findAndUpdateViewCount(int $productId): ?Model;
}
