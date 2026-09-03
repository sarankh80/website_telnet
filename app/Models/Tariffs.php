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
        "local_band",
        "global_band",
        "description_en",
        "description_kh",
        "price",
        "term",
        "sort",
        "status",
        "created_at",
        "updated_at"
    ];
    public function services()
    {
        return $this->belongsTo(Service::class, "services_id", "id")->withDefault([
            "name_en" => "Unspecified",
            "name_kh" => "មិនច្បាស់លាស់",
        ]);
    }
}
