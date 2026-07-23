<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name_km', 'name_en', 'position_km', 'position_en',
        'photo', 'phone', 'email', 'telegram',
        'is_ceo', 'is_active', 'sort_order',
    ];

    protected $casts = ['is_ceo' => 'boolean', 'is_active' => 'boolean'];

    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('sort_order'); }
    public function scopeCeo($query) { return $query->where('is_ceo', true); }

    public function getName(): string { return app()->getLocale() === 'km' ? $this->name_km : $this->name_en; }
    public function getPosition(): string { return app()->getLocale() === 'km' ? $this->position_km : $this->position_en; }
}
