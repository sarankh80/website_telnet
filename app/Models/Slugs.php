<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slugs extends Model
{
    protected $table = 'slugs';

    protected $fillable = ['name', 'name_km', 'image', 'desc', 'desc_km'];

    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class, 'slug_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'slug_id');
    }
}
