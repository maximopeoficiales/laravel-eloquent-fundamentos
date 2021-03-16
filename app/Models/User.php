<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // un usuario tiene un perfil
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    // un usuario pertenece a un nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    // un usuario pertenece a un grupo pero tambien tiene muchos grupos
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    // un usuario tiene una locacion atravez de perfil
    public function location()
    {
        return $this->hasOneThrough(Profile::class, Location::class);
    }
}
