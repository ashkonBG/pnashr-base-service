<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
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
        'deleted_at',
    ];

    /**
     * @inheritDoc
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * @inheritDoc
     */
    protected $exactFilterable = [
        'title',
        'retailable',
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
}
