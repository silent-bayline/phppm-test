<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_hours_post_id',
        'content_id',
        'hour',
    ];

    public function get_study_hours_posts_table(){
        return $this->belongsTo('App\Models\StudyHoursPost');
    }

    public function get_contents_table(){
        return $this->belongsTo('App\Models\Content');
    }
}
