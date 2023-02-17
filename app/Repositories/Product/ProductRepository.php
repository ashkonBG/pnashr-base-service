<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function createWithRelations(array $attributes, array $categories, array $creators, array $tags): Model
    {
        $product = $this->create($attributes);

        $product->categories()->attach($categories);
        $product->creators()->attach($creators);
        $product->tags()->attach($tags);

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function findAndUpdateViewCount(int $productId): ?Model
    {
        $product = $this->find($productId);

        $product->update([
            'view_count' => $product->view_count + 1
        ]);

        return $product;
    }
}
