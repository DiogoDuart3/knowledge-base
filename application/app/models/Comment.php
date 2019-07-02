<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'user_id', 'issue_id', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function issue(){
        return $this->belongsTo(Issue::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
