<?php

namespace App\Repositories\Creator;

use App\Models\Creator;
use App\Repositories\BaseRepository;

class CreatorRepository extends BaseRepository implements CreatorRepositoryInterface
{
    /**
     * CreatorRepository constructor.
     *
     * @param Creator $model
     */
    public function __construct(Creator $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function createMany(array $creators): array
    {
        $createdCreators = [];

        foreach ($creators as $creator) {
            $createdCreators[] = $this->model->firstOrCreate(['name' => $creator['name']])->id;
        }

        return $createdCreators;
    }
}
