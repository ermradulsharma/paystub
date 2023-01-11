<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    static function getDeduction($request)
    {

        $dataObj = Deduction::where('type', $request->type)->get();
        $response['data'] = $dataObj;
        $response['status'] = STATUS_OK;

        return $response;
    }
}
