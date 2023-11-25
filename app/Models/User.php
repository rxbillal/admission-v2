<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function choice(){

        return $this->hasOne(Choice::class, 'user_id','id');

        }
    public function personalInfo(){

        return $this->hasOne(PersonalInfo::class, 'user_id');

        }

    public function kinInfo(){

        return $this->hasOne(KinInfo::class, 'user_id');

        }
    public function jambInfo(){

            return $this->hasOne(JambInfo::class, 'user_id');

        }
    public function waecInfo(){

            return $this->hasOne(WaecInfo::class, 'user_id');

        }
    public function eduInfo(){

            return $this->hasOne(EduInfo::class, 'user_id');

        }
    public function surveyInfo(){

            return $this->hasOne(SurveyInfo::class, 'user_id');
        }




}
