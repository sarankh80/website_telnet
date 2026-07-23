<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title_km', 'title_en', 'subtitle_km', 'subtitle_en',
        'image', 'button_text_km', 'button_text_en', 'button_url',
        'is_active', 'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('sort_order'); }

    public function getTitle(): string { return app()->getLocale() === 'km' ? $this->title_km : $this->title_en; }
    public function getSubtitle(): ?string { return app()->getLocale() === 'km' ? $this->subtitle_km : $this->subtitle_en; }
    public function getButtonText(): ?string { return app()->getLocale() === 'km' ? $this->button_text_km : $this->button_text_en; }
}
