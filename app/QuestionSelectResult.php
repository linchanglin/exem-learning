<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSelectResult extends Model
{
    public function questionResult(){
        return $this->belongsTo('App\QuestionResult');
    }
}
