<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lid extends Model
{
    use HasFactory;

    protected $table = 'leden';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'gebruiker_id',
        'telefoonnummer',
        'adres',
        'geboortedatum',
    ];

    protected $casts = [
        'geboortedatum' => 'date',
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
     * Relationship: Lid belongs to a Gebruiker.
     */
    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'gebruiker_id');
    }

    /**
     * Relationship: Lid has many Betalingen.
     */
    public function betalingen()
    {
        return $this->hasMany(Betaling::class, 'lid_id');
    }
}
