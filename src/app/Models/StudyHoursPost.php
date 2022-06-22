<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyHoursPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_hour',
        'study_date',
    ];

    public function get_users_table(){
        return $this->belongsTo('App\Models\User');
    }

    public function get_language_posts_table(){
        return $this->hasMany('App\Models\LanguagePost');
    }

    public function get_content_posts_table(){
        return $this->hasMany('App\Models\ContentPost');
    }

    public function get_today_hours(){
        
    }

    public function get_month_hours(){
        
    }

    public function get_total_hours(){
        
    }
}
