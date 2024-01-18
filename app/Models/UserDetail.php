<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    //Relacion uno a uno inversa con tabla users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

}
