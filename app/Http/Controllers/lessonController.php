<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCombinate;
use App\ExamResult;
use App\Question;
use App\QuestionResult;
use App\QuestionSelect;
use App\QuestionSelectResult;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class lessonController extends Controller
{
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->model = $questionRepository;
    }

    public function lesson()
    {
        $passExamId = Auth::user()->examResults->lists('exam_id')->toArray();
        $exams = Auth::user()->exams()->whereNotIn('exam_id', $passExamId)->get();

        return view('lessons.lesson', compact('exams'));
    }

    public function lessonDone()
    {
        $passExamId = Auth::user()->examResults->lists('exam_id')->toArray();
        $exams = Auth::user()->exams()->whereIn('exam_id', $passExamId)->get();

        return view('lessons.lessonDone', compact('exams'));
    }

    public function lessonOver()
    {
        return view('lessons.lessonOver');
    }

    public function exam($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = $this->model->preview($id);

        return view('lessons.exam', compact('exam', 'questions', 'id'));
    }

    public function store($id)
    {
        $inputs = Input::all();
        $this->model->storeResult($inputs,$id);

        return redirect('/lessons');
    }

    public function examDone($id)
    {
        $exam = Exam::findOrFail($id);
        $examResults = Auth::user()->examResults()->where('exam_id',$id)->get();
        foreach($examResults as $examResult)
        {
            $questionId= $examResult->questionResults->lists('question_id')->toArray();

            for($i = 0;$i < count($questionId);$i ++)
            {
                $questions[] = Question::findOrFail($questionId[$i]);
            }

            $questionResultId= $examResult->questionResults->lists('id')->toArray();

            for($j = 0;$j < count($questionResultId);$j ++)
            {
                $questionSelectResult = QuestionSelectResult::where('question_result_id',$questionResultId[$j])->get();
                foreach($questionSelectResult as $select)
                {
                   $choosedSelectIds[] = $select->question_select_id;
                }
            }

            $questionResults = $examResult->questionResults;
            foreach($questionResults as $questionResult)
            {
                if(! $questionResult->answer == null)
                {
                    $answer[$questionResult->question_id] = $questionResult->answer;
                }

                $questionIf = Question::findOrFail($questionResult->question_id);
                if($questionIf->questionType == '是非题')
                {
                    foreach($questionIf->questionSelects as $select)
                    {
                        if($questionResult->ifTrue)
                        {
                            $QIfTrue[$questionIf->id] = $select->ifTrue;
                        }
                        else
                        {
                            if($select->ifTrue){
                                $QIfTrue[$questionIf->id] = 0;
                            }
                            else
                            {
                                $QIfTrue[$questionIf->id] = 1;
                            }
                        }
                    }
                }

            }

            $allScore= $examResult->questionResults->lists('score')->toArray();
            if(in_array(null,$allScore))
            {
                $score = '考试阅卷中';
            }
            else
            {
                $score = '考试成绩:&nbsp;&nbsp;&nbsp;'.array_sum($allScore);
            }

        }

        return view('lessons.examDone',compact('exam','questions','choosedSelectIds','QIfTrue','answer','score','id'));
    }


}
