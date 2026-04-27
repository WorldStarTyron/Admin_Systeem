<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'gebruiker_id',
        'aangemaakt_door',
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
     * Relationship: Admin belongs to a Gebruiker.
     */
    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'gebruiker_id');
    }

    /**
     * Relationship: Admin was created by another Gebruiker.
     */
    public function aangemaaktDoor()
    {
        return $this->belongsTo(Gebruiker::class, 'aangemaakt_door');
    }

    /**
     * Relationship: Admin has approved many Betalingen.
     */
    public function goedgekeurdeBetalingen()
    {
        return $this->hasMany(Betaling::class, 'goedgekeurd_door');
    }
}
