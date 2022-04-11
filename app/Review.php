<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'content', 'vote', 'username'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
