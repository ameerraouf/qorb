<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_ar',
        'role_en',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];
}
