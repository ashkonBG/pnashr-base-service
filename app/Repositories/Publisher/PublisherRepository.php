<?php

namespace App\Repositories\Publisher;

use App\Models\Publisher;
use App\Repositories\BaseRepository;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    /**
     * PublisherRepository constructor.
     *
     * @param Publisher $model
     */
    public function __construct(Publisher $model)
    {
        parent::__construct($model);
    }
}
