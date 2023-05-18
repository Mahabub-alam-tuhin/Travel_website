<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    function resort(){
        return $this->hasOne(booking::class,'resort_id','id');
    }
}