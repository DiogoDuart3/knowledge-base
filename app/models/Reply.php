<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
