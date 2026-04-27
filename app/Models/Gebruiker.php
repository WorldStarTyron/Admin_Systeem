<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Gebruiker extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     */
    protected $table = 'gebruikers';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'string';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'gebruiker_id';

    /**
     * Disable default timestamps (we use custom column names).
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'naam',
        'email',
        'wachtwoord_hash',
        'rol',
        'actief',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'wachtwoord_hash',
    ];

    /**
     * Boot function to auto-generate UUID.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->gebruiker_id)) {
                $model->gebruiker_id = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the password for authentication.
     * Laravel's Auth system looks for getAuthPassword().
     */
    public function getAuthPassword()
    {
        return $this->wachtwoord_hash;
    }

    /**
     * Relationship: Gebruiker has one Lid profile.
     */
    public function lid()
    {
        return $this->hasOne(Lid::class, 'gebruiker_id');
    }

    /**
     * Relationship: Gebruiker has one Admin profile.
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'gebruiker_id');
    }

    /**
     * Relationship: Gebruiker has many Notificaties.
     */
    public function notificaties()
    {
        return $this->hasMany(Notificatie::class, 'ontvanger_id');
    }

    /**
     * Relationship: Gebruiker has many WachtwoordResets.
     */
    public function wachtwoordResets()
    {
        return $this->hasMany(WachtwoordReset::class, 'gebruiker_id');
    }

    /**
     * Relationship: Gebruiker has many Activiteitslogs.
     */
    public function activiteitslogs()
    {
        return $this->hasMany(Activiteitslog::class, 'gebruiker_id');
    }
}
