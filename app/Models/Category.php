<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait, SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @inheritDoc
     */
    protected $hidden = [
        '_lft',
        '_rgt',
        'parent_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $attributes = $this->attributesToArray();
        $attributes = array_merge($attributes, $this->relationsToArray());

        if (empty($attributes['children'])) {
            unset($attributes['children']);
        }

        unset($attributes['pivot']);

        return $attributes;
    }
}
