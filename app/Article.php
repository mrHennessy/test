<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $fillable=['title','content','preview','meta_description','meta_keywords','category_id','comments_enable','public'];
}
