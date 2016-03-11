<?php

namespace App\Repositories;

use App\Exam;
use App\ExamCombinate;
use App\ExamResult;
use App\Grade;
use App\Question;
use App\QuestionResult;
use App\QuestionSelect;
use App\QuestionSelectResult;
use Illuminate\Support\Facades\Auth;

class QuestionRepository
{

    public function saveQuestion($question,$inputs,$id){

        $question->questionId = $inputs['questionId'];
        $question->question = $inputs['question'];
        $question->question_bank_id = $id;
        $question->priority = $inputs['priority'];
        $question->questionType = $inputs['questionType'];
        $question->save();

        foreach($question->questionSelects as $select)
        {
            $select->delete();
        }

        if ($inputs['questionType'] == '单选题')
        {
            $radioNum = $inputs['radioNum'];
            for($i = 1;$i <= $radioNum; $i ++)
            {
                $select = new QuestionSelect;
                $select->title = $inputs['title'.$i];
                $select->question_id = $question->id;
                if($inputs['ifTrue'] == $i)
                {
                    $select->ifTrue = 1;
                }
                else
                {
                    $select->ifTrue = 0;
                }

                $select->save();
            }
        }

        if ($inputs['questionType'] == '多选题')
        {
            $multipleNum = $inputs['multipleNum'];
            for($i = 1;$i <= $multipleNum; $i ++)
            {
                $select = new QuestionSelect;
                $select->title = $inputs['mulTitle'.$i];
                $select->question_id = $question->id;
                if(array_key_exists('mulIfTrue'.$i,$inputs))
                {
                    if($inputs['mulIfTrue'.$i] == 1)
                    {
                        $select->ifTrue = 1;
                    }
                    else
                    {
                        $select->ifTrue = 0;
                    }
                }
                else
                {
                    $select->ifTrue = 0;
                }

                $select->save();
            }
        }

        if ($inputs['questionType'] == '是非题')
        {
            $select = new QuestionSelect;
            $select->title = '是否正确';
            $select->question_id = $question->id;
            if($inputs['ifFalseTrue'] == 1)
            {
                $select->ifTrue = 1;
            }
            else
            {
                $select->ifTrue = 0;
            }

            $select->save();
        }

    }

    public function store($inputs,$id){
        $question = new Question;
        $this->saveQuestion($question,$inputs,$id);
    }

    public function update($inputs,$id,$questionId){
        $question = Question::findOrFail($questionId);
        $this->saveQuestion($question,$inputs,$id);
    }

    public function preview($id){
        $exam = Exam::findOrFail($id);
        $num = 0;
        $questions = array();
        foreach ($exam->examCombinates as $combinate)
        {
            $qId = Question::where('question_bank_id', $combinate->question_bank_id)->lists('id')->toArray();

            if ($combinate->questionNum > 1)
            {
                $randQId = array_rand($qId, $combinate->questionNum);
                for ($i = 0; $i < $combinate->questionNum; $i ++)
                {
                    $questions[ $num ] = Question::findOrFail($qId[ $randQId[ $i ] ]);
                    $num ++;
                }
            } else
            {
                $randQId = array_rand($qId);
                $questions[ $num ] = Question::findOrFail($qId[ $randQId ]);
                $num ++;
            }
        }
        return $questions;

    }

    /**
     * @param $id
     */
    public function storeResult($inputs,$id)
    {
        $examResult = new ExamResult;
        $examResult['user_id'] = Auth::user()->id;
        $examResult['exam_id'] = $id;
        $examResult->save();

        $inputs1 = array_slice($inputs, 1);
        $inputs2 = array_keys($inputs1);
        for ($i = 0; $i < count($inputs2); $i ++)
        {
            $inputs3 = substr($inputs2[ $i ], 8);
            $question = Question::findOrFail($inputs3);

            if ($question->questionType == '单选题')
            {
                $questionResult = new QuestionResult;
                $questionResult['exam_result_id'] = $examResult->id;

                $questionSelect = QuestionSelect::findOrFail($inputs[ 'question' . $inputs3 ]);
                if ($questionSelect->ifTrue == 1)
                {
                    $questionResult['ifTrue'] = 1;
                    $combinate = ExamCombinate::where('exam_id', $id)->where('question_bank_id', $question->questionBank->id)->get();
                    foreach ($combinate as $com)
                    {
                        $questionResult['score'] = ($com->percent) / ($com->questionNum);
                    }


                } else
                {
                    $questionResult['ifTrue'] = 0;
                    $questionResult['score'] = 0;
                }
                $questionResult['question_id'] = $inputs3;

                $questionResult->save();

                $questionSelectResult = new QuestionSelectResult;
                $questionSelectResult['question_result_id'] = $questionResult->id;
                $questionSelectResult['question_select_id'] = $inputs[ 'question' . $inputs3 ];

                $questionSelectResult->save();

            }
            if ($question->questionType == '多选题')
            {

                $questionResult = new QuestionResult;
                $questionResult['exam_result_id'] = $examResult->id;
                $QStrue = QuestionSelect::where('question_id', $question->id)->where('ifTrue', '1')->get();
                if (count($QStrue) == count($inputs[ 'question' . $inputs3 ]))
                {
                    for ($j = 0; $j < count($inputs[ 'question' . $inputs3 ]); $j ++)
                    {
                        $questionSelect = QuestionSelect::findOrFail($inputs[ 'question' . $inputs3 ][ $j ]);
                        $trueNum[] = $questionSelect->ifTrue;
                    }
                    if (array_sum($trueNum) == count($inputs[ 'question' . $inputs3 ]))
                    {
                        $questionResult['ifTrue'] = 1;
                        $combinate = ExamCombinate::where('exam_id', $id)->where('question_bank_id', $question->questionBank->id)->get();
                        foreach ($combinate as $com)
                        {
                            $questionResult['score'] = ($com->percent) / ($com->questionNum);
                        }


                    } else
                    {
                        $questionResult['ifTrue'] = 0;
                        $questionResult['score'] = 0;
                    }
                } else
                {
                    $questionResult['ifTrue'] = 0;
                    $questionResult['score'] = 0;
                }

                $questionResult['question_id'] = $inputs3;

                $questionResult->save();

                for($k = 0;$k < count($inputs[ 'question' . $inputs3 ]); $k ++)
                {
                    $questionSelectResult = new QuestionSelectResult;
                    $questionSelectResult['question_result_id'] = $questionResult->id;
                    $questionSelectResult['question_select_id'] = $inputs[ 'question' . $inputs3 ][$k];

                    $questionSelectResult->save();
                }





            }
            if ($question->questionType == '是非题')
            {
                $questionResult = new QuestionResult;
                $questionResult['exam_result_id'] = $examResult->id;
                $questionSelect = QuestionSelect::where('question_id', $question->id)->get();
                foreach ($questionSelect as $select)
                {
                    if ($inputs[ 'question' . $inputs3 ] == $select->ifTrue)
                    {
                        $questionResult['ifTrue'] = 1;
                        $combinate = ExamCombinate::where('exam_id', $id)->where('question_bank_id', $question->questionBank->id)->get();
                        foreach ($combinate as $com)
                        {
                            $questionResult['score'] = ($com->percent) / ($com->questionNum);
                        }
                    } else
                    {
                        $questionResult['ifTrue'] = 0;
                        $questionResult['score'] = 0;
                    }

                }
                $questionResult['question_id'] = $inputs3;

                $questionResult->save();
            }
            if ($question->questionType == '简答题')
            {
                $questionResult = new QuestionResult;
                $questionResult['exam_result_id'] = $examResult->id;
                $questionResult['question_id'] = $inputs3;
                $questionResult['answer'] = $inputs[ 'question' . $inputs3 ];

                $questionResult->save();

                $grade = new Grade;
                $grade['exam_result_id'] = $examResult->id;
                $grade['question_id'] = $inputs3;
                $grade['answer'] = $inputs[ 'question' . $inputs3 ];
                $grade->save();

            }
        }

    }






}
