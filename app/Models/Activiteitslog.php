<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activiteitslog extends Model
{
    use HasFactory;

    protected $table = 'activiteitslogs';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'gebruiker_id',
        'actie',
        'entiteit_type',
        'entiteit_id',
        'details',
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
     * Relationship: Activiteitslog belongs to a Gebruiker.
     */
    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'gebruiker_id');
    }
}
