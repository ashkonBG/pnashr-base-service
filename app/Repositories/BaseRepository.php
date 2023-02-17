<?php

namespace App\Repositories;

use App\Http\Resources\PaginatorCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    public $model;

    /**
     * @var int
     */
    protected $perPageLimit = 20;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function getAll(Request $request): PaginatorCollection
    {
        $filters = $request->query('filter', []);
        $search = $request->query('search', '');
        $sorts = $request->query('sort', []);
        $perPage = (int)$request->query('per_page', $this->perPageLimit);

        return new PaginatorCollection(
            $this->model
                ->filterBy($filters)
                ->searchBy($search)
                ->sortBy($sorts)
                ->paginate($this->getPerPage($perPage))
        );
    }



}
