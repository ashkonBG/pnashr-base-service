<?php

namespace App\Repositories\Creator;

interface CreatorRepositoryInterface
{
    /**
     * @param array $creators
     *
     * @return array
     */
    public function createMany(array $creators): array;
}
