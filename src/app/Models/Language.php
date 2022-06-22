<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function get_language_posts_table(){
        return $this->hasOne('App\Models\LanguagePost');
    }
}
