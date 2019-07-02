<?php

namespace App\models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
//    use AuthenticableTrait;
    use Notifiable;
    use SoftDeletes;
//    use CanResetPassword;

//    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates=['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function posts(){
        return $this->hasOne(Issue::class);
    }

    public function isAdmin(){
        if(Auth::user()->role->name == "admin") return true;
        else return false;
    }
}
