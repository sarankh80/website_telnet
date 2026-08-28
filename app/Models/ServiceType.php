<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $fillable = ['name', 'name_km', 'image','icon', 'desc', 'desc_km', 'slug_id'];

    public function slug()
    {
        return $this->belongsTo(Slugs::class, 'slug_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'service_type')->orderBy('sort_order','asc');
    }
}
