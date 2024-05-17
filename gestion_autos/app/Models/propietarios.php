<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propietarios extends Model
{
    use HasFactory;
    public function autos(){
        return $this->hasMany(autos::class, 'id');
    }
}
