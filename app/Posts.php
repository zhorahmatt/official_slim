<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id_user', 'slug', 'title', 'content', 'keyword', 'image', 'category', 'status', 'comment' ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
