<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model
{
    protected $table = "tariffs";
    protected $fillable = [
        "id",
        "services_id",
        "name_en",
        "name_kh",
        "description_en",
        "description_kh",
        "price",
        "term",
        "image",
        "created_at",
        "updated_at"
    ];
    public function services()
    {
        return $this->belongsTo(Service::class, "services_id", "id");
    }
}
