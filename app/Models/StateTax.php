<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateTax extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'state_code',
        'country_code',
        'state_tax',
    ];
}
