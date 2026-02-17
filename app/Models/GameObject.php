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
    ];
    
    // Allow mass assignment
    protected $guarded = [];
}
