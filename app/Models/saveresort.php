<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveresort extends Model
{
    use HasFactory;

    function divisions(){
        return $this->hasOne(Division::class,'id','division_id');
    }
    function district(){
        return $this->hasOne(District::class,'id','district_id');
    }
    function upazila(){
        return $this->hasOne(Upazila::class,'id','upazila_id');
    }
    function union(){
        return $this->hasOne(Union::class,'id','union_id');
    }
       function saveguides(){
        return $this->hasOne(Saveguide::class,'id','guid_id');
    }

}
