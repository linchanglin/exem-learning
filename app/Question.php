<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questionId',
        'question_bank_id',
        'question',
        'priority',
        'questionType',
    ];

    public function questionBank(){
        return $this->belongsTo('App\QuestionBank');
    }

    public function questionSelects(){
        return $this->hasMany('App\QuestionSelect');
    }
}
