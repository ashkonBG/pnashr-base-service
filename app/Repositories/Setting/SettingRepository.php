<?php

namespace App\Repositories\Setting;

use App\Models\Model;
use App\Models\Setting;
use App\Repositories\BaseRepository;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * SettingRepository constructor.
     *
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function findByPlatformType(string $platformType): Model
    {
        return $this->model->where('setting_key', $platformType)->first();
    }
}
