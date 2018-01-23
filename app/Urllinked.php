<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urllinked extends Model
{
    protected $table = 'linked_url';

    protected $fillable = ['title', 'description', 'url_link'];
    
}
