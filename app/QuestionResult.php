<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    public function examResult(){
        return $this->belongsTo('App\ExamResult');
    }

    public function questionSelectResults(){
        return $this->hasMany('App\QuestionSelectResult');
    }
}
