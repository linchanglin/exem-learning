<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function examResult(){
        return $this->belongsTo('App\ExamResult');
    }
}
