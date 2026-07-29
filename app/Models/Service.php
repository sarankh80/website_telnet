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
        'icon',
        'badge_km',
        'badge_en',
        'color',
        'image',
        'is_active',
        'sort_order',
        'service_type',
        'slug_id',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getName(): string
    {
        return app()->getLocale() === 'km' ? $this->name_km : $this->name_en;
    }
    public function getDescription(): ?string
    {
        return app()->getLocale() === 'km' ? $this->description_km : $this->description_en;
    }
    public function getBadge(): ?string
    {
        return app()->getLocale() === 'km' ? $this->badge_km : $this->badge_en;
    }

    public function slug()
    {
        return $this->belongsTo(Slugs::class, 'slug_id');
    }

    public function type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type');
    }
}
