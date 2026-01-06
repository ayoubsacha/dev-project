<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'category_id',
        'manager_id',
        'name',
        'model_number',
        'serial_number',
        'specs',
        'location',
        'status'
    ];

    // Important for the JSON column!
    protected $casts = [
        'specs' => 'array',
    ];
}
