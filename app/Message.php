<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email', 'content','user_id', 'cellphone', 'name', 'surname'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
