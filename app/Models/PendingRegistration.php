<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingRegistration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_token',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
