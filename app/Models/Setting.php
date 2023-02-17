<?php

namespace App\Models;

class Setting extends Model
{
    /**
     * @inheritdoc
     */
    protected $fillable = [
        'setting_key',
        'setting_value',
    ];

    /**
     * @inheritdoc
     */
    protected $casts = [
        'setting_value' => 'array'
    ];
}
