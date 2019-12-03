<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Access;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'newsletter_subscription'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function access() {

        return $this->hasManyThrough('App\Study', 'App\Access', 'user_id', 'id', 'id', 'study_id');
    }

    function sublist(){

        return  $this->hasManyThrough('App\Study_item',  'App\Access', 'user_id', 'study_id', 'id', 'study_id');

    }
    function subStudyPartisipants(){

        return  $this->belongsTo('App\Access');
    }

}
