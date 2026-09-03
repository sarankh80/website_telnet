<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SlugBenifit extends Model
{
    protected $table = "slug_benifits";
    protected $fillable = [
        "id",
        "slug_id",
        "title",
        "title_km",
        "icon",
        "desc",
        "desc_km",
        "created_at",
        "updated_at"
    ];
}
