<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Betalingsbewijs extends Model
{
    use HasFactory;

    protected $table = 'betalingsbewijzen';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'betaling_id',
        'bestandspad',
        'status',
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
     * Relationship: Betalingsbewijs belongs to a Betaling.
     */
    public function betaling()
    {
        return $this->belongsTo(Betaling::class, 'betaling_id');
    }
}
