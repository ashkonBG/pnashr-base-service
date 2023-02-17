<?php

namespace App\Repositories\Setting;

use App\Models\Model;

interface SettingRepositoryInterface
{
    /**
     * @param string $platformType
     *
     * @return Model
     */
    public function findByPlatformType(string $platformType): Model;
}
