<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Image extends Model
{
    use HasFactory;
    public function images()
    {
        Relation::morphMap([
            'templates' => Template::class,
        ]);
    }

    public function getFileAttribute($image = null)
    {
        if ($image != "") {
            if ($this->module_type == "App\Models\Template") {
                return asset("storage/templates/" . $image);
            }
        }
        return "";
    }
}
