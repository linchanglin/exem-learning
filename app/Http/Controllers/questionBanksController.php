<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\QuestionBankCreateRequest;
use App\Http\Requests\QuestionBankUpdateRequest;
use App\QuestionBank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class questionBanksController extends Controller
{
    public function index(){
        $questionBanks = QuestionBank::paginate(5);
        return view('questionBanks.index',compact('questionBanks'));
    }

    public function show($id){
        $questionBank = QuestionBank::findOrFail($id);
        $questions = $questionBank->questions;
        return view('questionBanks.show',compact('questionBank','questions','id'));
    }

    public function create(){
        $departments = Department::lists('department','id');
        return view('questionBanks.create',compact('departments'));
    }

    public function store(QuestionBankCreateRequest $request)
    {
        $questionBank = QuestionBank::create($request->all());
        $questionBank->departments()->attach($request->input('departments'));

        return  redirect()
            ->route('questionBanks.index');
    }

    public function edit($id)
    {
        $questionBank = QuestionBank::findOrFail($id);
        $depart=$questionBank->departments()->lists('department')->all();
        $departments = Department::lists('department','id');

        return view('questionBanks.edit',compact('departments','questionBank','depart'));
    }

    public function update(QuestionBankUpdateRequest $request, $id)
    {
        $questionBank = QuestionBank::findOrFail($id);
        $questionBank->update($request->all());
        $questionBank->departments()->detach();
        $questionBank->departments()->attach($request->input('departments'));

        return redirect()->route('questionBanks.index');
    }

    public function destroy($id)
    {
        $questionBank = QuestionBank::findOrFail($id);
        $questionBank->departments()->detach();
        foreach ($questionBank->questions as $question){
            $question->delete();
        }
        $questionBank->delete();

        return redirect()
                        ->route('questionBanks.index');
    }
}

























