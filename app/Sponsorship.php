<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'type', 'price', 'duration', 'description'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
