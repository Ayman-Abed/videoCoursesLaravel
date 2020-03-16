<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'meta_keywords', 'meta_description'];



    public function videos()
    {

        return  $this->hasMany("App\Video");
    }
}
