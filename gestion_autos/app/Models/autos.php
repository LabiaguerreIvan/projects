<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autos extends Model
{
    use HasFactory;
    public function propietarios(){
        return $this->belongsTo(propietarios::class, 'id');
    }
}
