<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'amount',
        'currency',
        'status',
        'gateway',
        'metadata',
        'response_data',
    ];

    protected $casts = [
        'metadata' => 'array',
        'response_data' => 'array',
    ];
}
