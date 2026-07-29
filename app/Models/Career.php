<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title', 'title_km', 'department', 'department_km',
        'location', 'location_km', 'type',
        'description', 'description_km',
        'requirements', 'requirements_km',
        'deadline', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deadline'  => 'date',
    ];

    public function applications()
    {
        return $this->hasMany(CareerApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where(fn($q) => $q->whereNull('deadline')->orWhere('deadline', '>=', now()))
                     ->orderBy('sort_order');
    }

    public function getTitle(): string
    {
        return app()->getLocale() === 'km' ? $this->title_km : $this->title;
    }

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'full-time'  => 'Full-Time',
            'part-time'  => 'Part-Time',
            'contract'   => 'Contract',
            'internship' => 'Internship',
            default      => $this->type,
        };
    }
}
