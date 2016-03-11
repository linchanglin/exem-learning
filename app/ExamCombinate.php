<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamCombinate extends Model
{
    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function questionBank(){
        return $this->belongsTo('App\QuestionBank');
    }
}
