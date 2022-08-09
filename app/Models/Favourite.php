<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function doctor(){
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }
}
