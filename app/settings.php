<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    protected $fillable = [
        'user_name', 'blog_name', 'about','manegar', 'phone_number', 'facebook'
    ];
}
