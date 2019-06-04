<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
