<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Betaling extends Model
{
    use HasFactory;

    protected $table = 'betalingen';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'lid_id',
        'goedgekeurd_door',
        'bedrag',
        'methode',
        'status',
        'betalingsdatum',
        'maand',
        'jaar',
    ];

    protected $casts = [
        'bedrag' => 'decimal:2',
        'betalingsdatum' => 'date',
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
     * Relationship: Betaling belongs to a Lid.
     */
    public function lid()
    {
        return $this->belongsTo(Lid::class, 'lid_id');
    }

    /**
     * Relationship: Betaling was approved by an Admin.
     */
    public function goedgekeurdDoor()
    {
        return $this->belongsTo(Admin::class, 'goedgekeurd_door');
    }

    /**
     * Relationship: Betaling has many Betalingsbewijzen.
     */
    public function bewijzen()
    {
        return $this->hasMany(Betalingsbewijs::class, 'betaling_id');
    }

    /**
     * Relationship: Betaling has many Notificaties.
     */
    public function notificaties()
    {
        return $this->hasMany(Notificatie::class, 'betaling_id');
    }
}
