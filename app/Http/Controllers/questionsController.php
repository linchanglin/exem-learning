<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Question;
use App\QuestionBank;
use App\QuestionSelect;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class questionsController extends Controller
{
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->question = $questionRepository;
    }

    public function index($id){
        $questions = Question::where('question_bank_id',$id)->get();
        return view('questions.index',compact('questions','id'));
    }

    public function create($id){
        return view('questions.create',compact('id'));
    }

    public function store(QuestionCreateRequest $request,$id){

        $this->question->store($request->all(),$id);



        //$inputs = Input::all();
        //
        //$question = new Question;
        //$question->questionId = $inputs['questionId'];
        //$question->question = $inputs['question'];
        //$question->question_bank_id = $id;
        //$question->priority = $inputs['priority'];
        //$question->questionType = $inputs['questionType'];
        //$question->save();
        //
        //if ($inputs['questionType'] == '单选题')
        //{
        //    $radioNum = $inputs['radioNum'];
        //    for($i = 1;$i <= $radioNum; $i ++)
        //    {
        //        $select = new QuestionSelect;
        //        $select->title = $inputs['title'.$i];
        //        $select->question_id = $question->id;
        //        if($inputs['ifTrue'] == $i)
        //        {
        //            $select->ifTrue = 1;
        //        }
        //        else
        //        {
        //            $select->ifTrue = 0;
        //        }
        //
        //        $select->save();
        //    }
        //}
        //
        //if ($inputs['questionType'] == '多选题')
        //{
        //    $multipleNum = $inputs['multipleNum'];
        //    for($i = 1;$i <= $multipleNum; $i ++)
        //    {
        //        $select = new QuestionSelect;
        //        $select->title = $inputs['mulTitle'.$i];
        //        $select->question_id = $question->id;
        //        if(array_key_exists('mulIfTrue'.$i,$inputs))
        //        {
        //            if($inputs['mulIfTrue'.$i] == 1)
        //            {
        //                $select->ifTrue = 1;
        //            }
        //            else
        //            {
        //                $select->ifTrue = 0;
        //            }
        //        }
        //        else
        //        {
        //            $select->ifTrue = 0;
        //        }
        //
        //        $select->save();
        //    }
        //}
        //
        //if ($inputs['questionType'] == '是非题')
        //{
        //    $select = new QuestionSelect;
        //    $select->title = '是否正确';
        //    $select->question_id = $question->id;
        //    if($inputs['ifFalseTrue'] == 1)
        //    {
        //        $select->ifTrue = 1;
        //    }
        //    else
        //    {
        //        $select->ifTrue = 0;
        //    }
        //
        //    $select->save();
        //}

        //以下的储存方式不能获得题目的id
        ////$question->create($request->all());
        ///QuestionSelect::create(Input::all());
        return redirect('/questionBanks/'.$id.'/questions');
    }

    public function edit($id,$questionId){
        $question = Question::findOrFail($questionId);
        return view('questions.edit',compact('question','id'));
    }

    public function update(QuestionUpdateRequest $request, $id, $questionId){
        $this->question->update($request->all(),$id,$questionId);
        return redirect('/questionBanks/'.$id.'/questions');
    }

    public function destroy($id,$questionId){
        $question = Question::findOrFail($questionId);
        $question->questionSelects()->delete();
        $question->delete();

        return redirect('/questionBanks/'.$id.'/questions');
    }


}