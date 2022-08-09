<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public function speciality(){
        return $this->hasMany(Speciality::class, 'doctor_id');
    }
    public function fav(){
        return $this->hasMany(Favourite::class, 'doctor_id');
    }
}
