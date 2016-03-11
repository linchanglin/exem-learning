<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'examId',
        'title',
        'description',
        'examTime',
        'limitTimes',
        'limitDays',
        'passScore',
        'catalog_id',
        'user_id',
        'ifEmail',
        'ifLink',
    ];

    public function examCombinates(){
        return $this->hasMany('App\ExamCombinate');
    }

    public function users(){
        return $this->belongsToMany('App\User','exam_user_pivot');
    }

    public function examResults(){
        return $this->hasMany('App\ExamResult');
    }
}
