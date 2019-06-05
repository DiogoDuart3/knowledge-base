<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        return $this->HasMany(Post::class);
    }
}
