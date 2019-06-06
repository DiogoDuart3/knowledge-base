<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function post(){
        return $this-$this->belongsTo(Issue::class);
    }
}
