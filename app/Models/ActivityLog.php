<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'action', 'description',
        'subject_type', 'subject_id',
        'ip_address', 'properties',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'properties' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function log(string $action, string $description, ?Model $subject = null, array $properties = []): void
    {
        static::create([
            'user_id'      => auth()->id(),
            'action'       => $action,
            'description'  => $description,
            'subject_type' => $subject ? class_basename($subject) : null,
            'subject_id'   => $subject?->getKey(),
            'ip_address'   => request()->ip(),
            'properties'   => $properties ?: null,
        ]);
    }

    public function actionBadge(): string
    {
        return match ($this->action) {
            'login'  => 'bg-brand-green/15 text-brand-green',
            'logout' => 'bg-slate-700 text-slate-400',
            'create' => 'bg-sky-500/15 text-sky-400',
            'update' => 'bg-yellow-500/15 text-yellow-400',
            'delete' => 'bg-red-500/15 text-red-400',
            default  => 'bg-slate-700 text-slate-300',
        };
    }
}
