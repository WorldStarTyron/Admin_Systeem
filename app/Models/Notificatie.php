<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notificatie extends Model
{
    use HasFactory;

    protected $table = 'notificaties';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'ontvanger_id',
        'betaling_id',
        'type',
        'bericht',
        'gelezen',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    /**
     * Relationship: Notificatie belongs to a Gebruiker (ontvanger).
     */
    public function ontvanger()
    {
        return $this->belongsTo(Gebruiker::class, 'ontvanger_id');
    }

    /**
     * Relationship: Notificatie optionally belongs to a Betaling.
     */
    public function betaling()
    {
        return $this->belongsTo(Betaling::class, 'betaling_id');
    }
}
