<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class examStudentController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $usersPivotId = $exam->users->lists('id');
        $usersUnPivot = User::where('role_id', 1)->where('department_id', Auth::user()->department_id)->whereNotIn('id', $usersPivotId)->get();
        $usersPivot = $exam->users->where('role_id', 1);

        return view('exams.student', compact('exam', 'usersUnPivot', 'usersPivot', 'id'));
    }

    public function store(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->users()->attach($request->input('student'));

        return redirect('/exams/' . $id . '/student');
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->users()->detach($request->input('student'));

        return redirect('/exams/' . $id . '/student');
    }
}