<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $fillable = [
        'questionBank'
    ];

    public function departments(){
        return $this->belongsToMany('App\Department','department_questionBank_pivot');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function examCombinates(){
        return $this->hasMany('App\ExamCombinate');
    }

}
