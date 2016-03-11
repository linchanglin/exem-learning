<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class examTeacherController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $usersPivotId = $exam->users->lists('id');
        $usersUnPivot = User::where('role_id', 2)->where('department_id', Auth::user()->department_id)->whereNotIn('id', $usersPivotId)->get();
        $usersPivot = $exam->users->where('role_id', 2);

        return view('exams.teacher', compact('exam', 'usersUnPivot', 'usersPivot', 'id'));
    }

    public function store(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->users()->attach($request->input('teacher'));

        return redirect('/exams/' . $id . '/teacher');
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->users()->detach($request->input('teacher'));

        return redirect('/exams/' . $id . '/teacher');
    }
}