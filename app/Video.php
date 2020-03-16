<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'image',
        'description',
        'meta_keywords',
        'meta_description',
        'youtube',
        'published'
    ];



    public function category()
    {

        return  $this->belongsTo("App\Category");
    }


    public function user()
    {

        return  $this->belongsTo("App\User");
    }


    public function comment()
    {

        return  $this->hasMany("App\Comment");
    }



    public function skills()
    {
        return  $this->belongsToMany("App\Skill", "skills_video");
    }


    public function tags()
    {
        return  $this->belongsToMany("App\Tag", "tags_video");
    }


    public function getImagePathAttribute()
    {
        return asset($this->image);
    }
}
