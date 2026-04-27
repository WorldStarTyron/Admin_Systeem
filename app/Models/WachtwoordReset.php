<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WachtwoordReset extends Model
{
    use HasFactory;

    protected $table = 'wachtwoord_reset';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'gebruiker_id',
        'token',
        'gebruikt',
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
     * Relationship: WachtwoordReset belongs to a Gebruiker.
     */
    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'gebruiker_id');
    }
}
