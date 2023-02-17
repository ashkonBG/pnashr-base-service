<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * The columns that can be filtered using <WHERE> clause.
     *
     * @var array
     */
    protected $exactFilterable = [];

    /**
     * The columns that can be filtered using <LIKE> clause.
     *
     * @var array
     */
    protected $partialFilterable = [];

    /**
     * The attributes that can be filtered using model relations.
     *
     * @var array
     */
    protected $relationalFilterable = [];

    /**
     * The columns that can be searched using <LIKE> clause.
     *
     * @var array
     */
    protected $searchable = [];

    /**
     * The columns that can be sorted.
     *
     * @var array
     */
    protected $sortable = [];

    /**
     * Add filter scope to the query.
     *
     * @param Builder $query
     * @param array   $attributes
     *
     * @return Builder
     */
    public function scopeFilterBy(Builder $query, array $attributes): Builder
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->exactFilterable)) {
                $query->where($key, $value);
            }

            if (in_array($key, $this->partialFilterable)) {
                $query->where($key, 'LIKE', '%' . $value . '%');
            }

            if (in_array($key, $this->relationalFilterable)) {
                $method = 'filterBy' . ucfirst($key);

                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                }
            }
        }

        return $query;
    }

    /**
     * Add search scope to the query.
     *
     * @param Builder $query
     * @param string  $searchValue
     *
     * @return Builder
     */
    public function scopeSearchBy(Builder $query, string $searchValue): Builder
    {
        if ($searchValue !== '') {
            $query->where(function ($subQuery) use ($searchValue) {
                foreach ($this->searchable as $value) {
                    $subQuery->orWhere($value, 'LIKE', '%' . $searchValue . '%');
                }
            });
        }

        return $query;
    }

    /**
     * Add sort scope to the query.
     *
     * @param Builder $query
     * @param array   $attributes
     *
     * @return Builder
     */
    public function scopeSortBy(Builder $query, array $attributes): Builder
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->sortable)) {
                if ($value === 'asc') {
                    $query->orderBy($key, 'asc');
                } else if ($value === 'desc') {
                    $query->orderBy($key, 'desc');
                }
            }
        }

        return $query;
    }
}
