<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function questionResults(){
        return $this->hasMany('App\QuestionResult');
    }

    public function grades(){
        return $this->hasMany('App\Grade');
    }
}
