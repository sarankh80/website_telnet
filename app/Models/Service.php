<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name_km',
        'name_en',
        'description_km',
        'description_en',
        'price',
        'terms',
        'image',
        'is_active',
        'sort_order',
        'service_type',
        "created_at",
        "updated_at"
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
}
