<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    public  $table = 'category_user';
    protected $fillable = [
        'category_id', 'user_id'
    ];
}
