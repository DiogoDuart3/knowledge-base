<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function issues(){
        return $this->belongsToMany(Issue::class)->withTimestamps();
    }
}
