<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameObject extends Model
{
    /** @use HasFactory<\Database\Factories\ObjectFactory> */
    use HasFactory;

    protected $casts = [
        'color' => 'array',
        'size' => 'array',
        'rigidbody' => 'boolean',
        'use_gravity' => 'boolean',
    ];
    
    // Allow mass assignment
    protected $guarded = [];
}
