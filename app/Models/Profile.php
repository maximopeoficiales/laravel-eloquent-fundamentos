<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // necesario para hasOneThrough TIENE UNO ATRAVEZ DE
    // un perfil tiene un locacion
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
