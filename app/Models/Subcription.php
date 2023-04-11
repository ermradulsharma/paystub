<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcription extends Model
{
    use HasFactory;

    public function plan(){
        return $this->hasOne(Plan::Class,'id','plan_id');
    }
}
