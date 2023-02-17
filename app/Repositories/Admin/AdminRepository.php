<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Repositories\BaseRepository;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * AdminRepository constructor.
     *
     * @param Admin $model
     */
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}
