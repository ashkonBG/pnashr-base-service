<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creator extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @inheritDoc
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_has_creators')->withPivot('role');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $attributes = $this->attributesToArray();
        $attributes = array_merge($attributes, $this->relationsToArray());

        if (isset($attributes['pivot']['role'])) {
            $attributes['role'] = $attributes['pivot']['role'];

            unset($attributes['pivot']);
        }

        return $attributes;
    }
}
