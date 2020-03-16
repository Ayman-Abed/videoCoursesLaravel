<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];


    public function vedios()
    {
        return  $this->belongsToMany("App\Video", "tags_video");
    }
}
