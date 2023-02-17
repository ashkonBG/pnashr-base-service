<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'view_count'
    ];

    /**
     * @inheritDoc
     */
    protected $hidden = [
        'admin_id',
        'publisher_id',
        'archived_at',
        'deleted_at',
        'publisher_share',
    ];

    /**
     * @inheritDoc
     */
    protected $casts = [
        'archived_at' => 'datetime',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * @inheritDoc
     */
    protected $with = [
        'publisher',
        'categories',
        'creators',
        'tags',
    ];

    /**
     * @inheritDoc
     */
    protected $exactFilterable = [
        'packageable',
        'title',
        'type',
    ];

    /**
     * @inheritDoc
     */
    protected $partialFilterable = [
        'description'
    ];

    /**
     * @inheritDoc
     */
    protected $relationalFilterable = [
        'category',
        'publisher',
        'creator',
        'tag'
    ];

    /**
     * @inheritDoc
     */
    protected $searchable = [
        'title',
        'description'
    ];

    /**
     * @inheritDoc
     */
    protected $sortable = [
        'id',
        'title',
        'created_at',
        'view_count'
    ];

    /**
     * @return BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * @return BelongsToMany
     */
    public function creators()
    {
        return $this->belongsToMany(Creator::class, 'product_has_creators')->withPivot('role');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_has_categories');
    }

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_has_tags');
    }

    /**
     * @param Builder $query
     * @param         $value
     */
    public function filterByCategory(Builder $query, $value)
    {
        $query->whereHas('categories', function ($subQuery) use ($value) {
            $subQuery->where('categories.slug', $value);
        });
    }

    /**
     * @param Builder $query
     * @param         $value
     */
    public function filterByPublisher(Builder $query, $value)
    {
        $query->whereHas('publisher', function ($subQuery) use ($value) {
            $subQuery->where('publishers.name', $value);
        });
    }

    /**
     * @param Builder $query
     * @param         $value
     */
    public function filterByCreator(Builder $query, $value)
    {
        $query->whereHas('creators', function ($subQuery) use ($value) {
            $subQuery->where('creators.name', $value);
        });
    }

    /**
     * @param Builder $query
     * @param         $value
     */
    public function filterByTag(Builder $query, $value)
    {
        $query->whereHas('tags', function ($subQuery) use ($value) {
            $subQuery->where('tags.name', $value);
        });
    }
}
