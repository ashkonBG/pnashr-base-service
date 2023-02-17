<?php

namespace App\Repositories\Package;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface PackageRepositoryInterface
{
    /**
     * @param int $packageId
     *
     * @return Model
     * @throws ModelNotFoundException
     */
    public function findAndUpdateViewCount(int $packageId): ?Model;
}
