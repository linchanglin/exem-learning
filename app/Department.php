<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department'
    ];

    public function users(){
        return $this->hasMany('App\user');
    }

    public function questionbanks(){
        return $this->belongsToMany('App\QuestionBank','department_questionbank_pivot');
    }
}
