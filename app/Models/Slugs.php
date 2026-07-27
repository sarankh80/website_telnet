<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slugs extends Model
{
    protected $fillable = [
        "id",
        "name",
        "name_km",
        "desc",
        "desc_km",
        "created_at",
        "updated_at"
    ];
}
