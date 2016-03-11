<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSelect extends Model
{
    protected $fillable = [
        'question_id',
        'title',
        'ifTrue',
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
