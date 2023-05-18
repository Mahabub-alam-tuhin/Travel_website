<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveComment extends Model
{
    use HasFactory;

    function reply(){
        return $this->hasOne(replycomment::class,'comment_id','id');
    }
}
