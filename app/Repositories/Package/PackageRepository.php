<?php

namespace App\Repositories\Package;

use App\Models\Package;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class PackageRepository extends BaseRepository implements PackageRepositoryInterface
{
    /**
     * PackageRepository constructor.
     *
     * @param Package $model
     */
    public function __construct(Package $model)
    {
        parent::__construct($model);
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
