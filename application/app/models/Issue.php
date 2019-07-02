<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'user_id', 'subject', 'description', 'issue_solution', 'category_id'
    ];

    protected $dates=['deleted_at'];

    public function getDescriptionAttribute($value){
        $tagsToStrip = array('@<script[^>]*?>.*?</script>@si'); // you can add more
        return preg_replace($tagsToStrip, '', $value);
    }

    public function getSolutionAttribute($value){
        $tagsToStrip = array('@<script[^>]*?>.*?</script>@si'); // you can add more
        return preg_replace($tagsToStrip, '', $value);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
