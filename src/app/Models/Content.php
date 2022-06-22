<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function get_content_posts_table(){
        return $this->hasOne('App\Models\ContentPost');
    }
}

