<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function issues(){
        return $this->HasMany(Issue::class);
    }
}
