<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'tel',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip_code',
        'emp_id',
        'emp_ssn',
    ];

    public function getFullStateNameAttribute()
    {
        return StateTax::where('state_code', $this->state)->pluck('state')->first();
    }
}
