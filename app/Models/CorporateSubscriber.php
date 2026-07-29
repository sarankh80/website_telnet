<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateSubscriber extends Model
{
    protected $fillable = [
        'company_name',
        'company_name_km',
        'logo',
        'industry',
        'industry_km',
        'website',
        'contact_person',
        'contact_email',
        'contact_phone',
        'description',
        'description_km',
        'is_active',
        'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getName(): string
    {
        return app()->getLocale() === 'km' ? $this->company_name_km : $this->company_name;
    }
}
