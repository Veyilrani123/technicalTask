<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;


    public function currency(){
        return $this->hasOne(Currency::class, 'id', 'user_id');
    }

    public function patient_profile(){
        return $this->hasOne(PatientProfile::class, 'id', 'user_id');
    }
    
}
