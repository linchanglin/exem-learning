<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'department_id',
        'role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function exams(){
        return $this->belongsToMany('App\Exam','exam_user_pivot');
    }

    public function examResults(){
        return $this->hasMany('App\ExamResult');
    }
}
