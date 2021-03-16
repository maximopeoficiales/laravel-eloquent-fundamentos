<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    // Un grupo pertenece uno o muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
