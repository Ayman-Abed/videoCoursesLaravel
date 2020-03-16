<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];





    public function videos()
    {
        return  $this->belongsToMany("App\Video", "skills_video");
    }
}
