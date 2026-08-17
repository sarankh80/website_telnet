<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name_km',
        'name_en',
        'type',
        'address_km',
        'address_en',
        'phone',
        'email',
        'province_km',
        'province_en',
        'city',
        'city_km',
        'country',
        'country_km',
        'lat',
        'lng',
        'is_active',
        'avg_letency',
        "uptime",
        'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean', 'lat' => 'float', 'lng' => 'float'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
    public function scopeHq($query)
    {
        return $query->where('type', 'hq');
    }

    public function getName(): string
    {
        return app()->getLocale() === 'km' ? $this->name_km : $this->name_en;
    }
    public function getAddress(): ?string
    {
        return app()->getLocale() === 'km' ? $this->address_km : $this->address_en;
    }
    public function getProvince(): ?string
    {
        return app()->getLocale() === 'km' ? $this->province_km : $this->province_en;
    }
}
