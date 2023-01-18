<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateTax extends Model
{
    use HasFactory;
    static function getStateTaxes($request)
    {
        $dataObj = StateTax::get();
        $response['data'] = $dataObj;
        $response['status'] = STATUS_OK;
        return $response;
    }
}
