<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_name',
        'first_name',
        'family_name_hira',
        'first_name_hira',
        'email',
        'password',
        'generation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getData(){
        return $this->id . ': ' . $this ->family_name . ' ' . $this->first_name . ' (' . $this->email . ') [' . $this->generation . ']';
    }

    public function get_study_hours_posts_table(){
        return $this->hasMany('App\Models\StudyHoursPost');
    }

    public function get_language_posts_table(){
        return $this->hasManyThrough('App\Models\LanguagePost', 'App\Models\StudyHoursPost');
    }

    public function get_content_posts_table(){
        return $this->hasManyThrough('App\Models\ContentPost', 'App\Models\StudyHoursPost');
    }
}
