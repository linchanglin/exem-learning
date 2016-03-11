<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCombinate;
use App\QuestionBank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class examCombinateController extends Controller
{

    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $selectQuestionBankId = $exam->examCombinates->lists('question_bank_id');
        $unQuestionBanks = QuestionBank::whereNotIn('id', $selectQuestionBankId)->get();

        return view('exams.combinate', compact('exam', 'unQuestionBanks', 'id'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($id)
    {
        $inputs = Input::all();
        $exam = Exam::findOrFail($id);
        foreach ($exam->examCombinates as $combinate)
        {
            $combinate->delete();
        }


        $questionBanks = QuestionBank::all();

        foreach ($questionBanks as $questionBank)
        {
            $qNumber = $inputs[ 'questionNum' . $questionBank->id ];
            if ($qNumber > 0)
            {
                $combinate = new ExamCombinate;
                $combinate['question_bank_id'] = $questionBank->id;
                $combinate['exam_id'] = $id;
                $combinate['questionNum'] = $qNumber;
                $combinate['percent'] = $inputs[ 'percent' . $questionBank->id ];

                $combinate->save();
            }

        }


        return redirect('/exams/' . $id . '/combinate');

    }


}















