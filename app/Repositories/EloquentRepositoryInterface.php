<?php

namespace App\Repositories;

use App\Http\Resources\PaginatorCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param int $id
     *
     * @return Model
     * @throws ModelNotFoundException
     */
    public function find(int $id): ?Model;

    /**
     * @param Request $request
     *
     * @return PaginatorCollection
     */
    public function getAll(Request $request): PaginatorCollection;
}
