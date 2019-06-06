<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['user_id', 'subject', 'body', 'answer_id', 'confirmed_by_admin'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
