<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamResult;
use App\Grade;
use App\Question;
use App\QuestionResult;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class examMarkController extends Controller
{

    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $users = User::where('department_id', Auth::user()->department_id)->lists('id')->toArray();
        $examResultIds = ExamResult::where('exam_id', $id)->whereIn('user_id', $users)->lists('id')->toArray();
        $grades = Grade::whereIn('exam_result_id', $examResultIds)->where('score', null)->get();
        $users = User::lists('name', 'id')->toArray();
        $questions = Question::lists('question', 'id')->toArray();

        return view('exams.mark', compact('exam', 'grades', 'users', 'questions', 'id'));
    }

    public function show($id, $grade_id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::lists('question', 'id')->toArray();
        $grade = Grade::findOrFail($grade_id);

        $questionP = Question::findOrFail($grade->question_id);

        $combinates = $exam->examCombinates()->where('question_bank_id', $questionP->questionBank->id)->get();
        foreach ($combinates as $combinate)
        {
            $perfectScore = ($combinate->percent / $combinate->questionNum);
        }

        return view('exams.mark_show', compact('exam', 'questions', 'grade', 'perfectScore', 'id', 'grade_id'));
    }

    public function store($id, $grade_id)
    {
        $inputs = Input::all();
        $grade = Grade::findOrFail($grade_id);
        $grade->user_id = Auth::user()->id;
        $grade->score = $inputs['score'];
        $grade->save();

        $questionResults = QuestionResult::where('exam_result_id', $grade->exam_result_id)->where('question_id', $grade->question_id)->get();
        foreach ($questionResults as $questionResult)
        {
            $questionResult->score = $inputs['score'];
            $questionResult->save();
        }

        return redirect('/exams/' . $id . '/mark');
    }
}
