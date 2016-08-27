<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table="comments";
    protected $fillable=['author','email','content','article_id'];

    public function comments()
    {
        return $this->hasMany('App\Comments','article_id','id');
    }

}