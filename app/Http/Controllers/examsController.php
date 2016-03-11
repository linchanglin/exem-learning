<?php

namespace App\Http\Controllers;

use App\Department;


use App\Exam;
use App\QuestionBank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class examsController extends Controller
{
    public function index(){
        $exams = Exam::all();
        return view('exams.index',compact('exams'));
    }

    public function create(){
        $departments = Department::lists('department','id');
        return view('exams.create',compact('departments'));
    }

    public function store(){
        Exam::create(Input::all());
        return redirect('/exams');
    }

    public function edit($id){
        $exam = Exam::findOrFail($id);
        $departments = Department::lists('department','id');
        return view('exams.edit',compact('exam','departments','id'));
    }

    public function update($id){
        $exam = Exam::findOrFail($id);
        $exam->update(Input::all());
        return redirect('/exams');

    }


}
