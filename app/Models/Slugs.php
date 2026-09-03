<?php

namespace App\Models;

use App\Models\Admin\SlugBenifit;
use Illuminate\Database\Eloquent\Model;

class Slugs extends Model
{
    protected $table = 'slugs';

    protected $fillable = ['name', 'name_km', 'image', 'desc', 'desc_km'];

    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class, 'slug_id', 'id');
    }
    public function benifit()
    {
        return $this->hasMany(SlugBenifit::class, 'slug_id', 'id');
    }
}
