<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function getFullStateNameAttribute(){
        return StateTax::where('state_code',$this->state)->pluck('state')->first();
    }
}
