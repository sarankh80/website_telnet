<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "id",
        "name_km",
        "name_en",
        "description_km",
        "description_en",
        "image",
        "icon",
        "is_active",
        "sort_order",
        "created_at",
        "updated_at",
        "service_type"
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type');
    }
    public function tariff()
    {
        return $this->hasMany(Tariffs::class, 'services_id', 'id')->orderBy('sort',"asc");
    }
}
