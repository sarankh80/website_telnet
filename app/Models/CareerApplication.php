<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'career_id', 'full_name', 'email', 'phone',
        'position', 'cover_letter', 'cv_path', 'status', 'admin_notes',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'new'         => 'sky',
            'reviewing'   => 'yellow',
            'shortlisted' => 'violet',
            'hired'       => 'green',
            'rejected'    => 'red',
            default       => 'slate',
        };
    }
}
