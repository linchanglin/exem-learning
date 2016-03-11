<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class examDeleteController extends Controller
{
    public function index($id){
        $exam = Exam::findOrFail($id);
        $selectQB = array();
        foreach($exam->examCombinates as $combinate)
        {
           $selectQB[] = $combinate->questionBank->questionBank;
        }
        $QBnum = (count($selectQB));

        return view('exams.delete',compact('exam','id','selectQB','QBnum'));
    }

    public function destroy($id){
        $exam = Exam::findOrFail($id);
        foreach($exam->examResults as $examResult)
        {
            foreach($examResult->questionResults as $questionResult)
            {
               foreach($questionResult->questionSelectResults as $questionSelectResult)
               {
                   $questionSelectResult->delete();
               }
                $questionResult->delete();
            }
            foreach($examResult->grades as $grade)
            {
                $grade->delete();
            }
            $examResult->delete();
        }

        foreach($exam->examCombinates as $combinate)
        {
            $combinate->delete();
        }
        $exam->users()->detach();

        $exam->delete();

        return redirect('/exams');
    }
}
