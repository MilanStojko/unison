<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'bio', 'username', 'slug', 'avatar', 'cv', 'cellphone', 'address', 'email', 'password', 'category_id'
    ];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function availabilities(){
        return $this->belongsToMany('App\Availability');
    }

    public function sponsorships(){
        return $this->belongsToMany('App\Sponsorship');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

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
}
