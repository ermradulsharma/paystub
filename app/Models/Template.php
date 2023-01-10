<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->morphMany(Image::class, 'module');
    }
    static function getTemplate($request)
    {
        $basic = Template::with('images')->where('type', 'basic')->get();
        $advance = Template::with('images')->where('type', 'advance')->get();
        $response['basic'] = $basic;
        $response['advance'] = $advance;
        $response['status'] = STATUS_OK;

        return $response;
    }
}
