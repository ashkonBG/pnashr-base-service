<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'phone_number',
        'password',
        'date_of_birth',
        'gender',
        'status',
    ];

    /**
     * @inheritDoc
     */
    protected $hidden = [
        'email_verified_at',
        'password',
        'status',
        'deleted_at'
    ];
}
