@extends('app')
@section('content')

    <div id="page-container">
        <div class="leftpanel">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/questionBanks/{{ $id }}/edit">题库管理</a></li>
                <li class="active"><a href="/questionBanks/{{ $id }}/questions">题目管理</a></li>
                <li><a href="/questionBanks/{{ $id }}">预览</a></li>
                <li><a href="/questionBanks">返回</a></li>
            </ul>
        </div>
        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    添加新题目
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">



                    <form  role="form" method="POST" action="/questionBanks/{{ $id }}/questions">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="question_bank_id" value="{{ $id }}">

                        <div class="form-group">
                            <label for="questionId" class="h4">题目ID</label>
                            <input type="text" class="form-control" name="questionId">
                        </div>
                        <div class="form-group">
                            <label for="question" class="h4">题目</label>
                            <textarea class="form-control" name="question" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                           <span class="h5">分配题目时是否优先:&nbsp&nbsp&nbsp</span>
                            <label class="radio-inline">
                                <input type="radio" name="priority" id="" value="1"> 是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="priority" id="" value="0" checked> 否
                            </label>
                        </div>
                        <div class="form-group">
                           <label class="radio-inline">
                                <input type="radio" name="questionType" onclick="changeRadio()" id="" value="单选题" checked> 单选题
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="questionType" onclick="changeMultiple()" id="" value="多选题"> 多选题
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="questionType" onclick="changeFalse()" id="" value="是非题"> 是非题
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="questionType" onclick="changeSimple()" id="" value="简答题"> 简答题
                            </label>
                        </div>
                        <hr>

                        <div id="listNum">
                            <input type="hidden" id="radioNum" name="radioNum" value="2">
                            <input type="hidden" id="multipleNum" name="multipleNum" value="2">
                        </div>

                        <div id="radioDiv">
                            @include('questions.radio_create')
                        </div>


                        <div id="multipleDiv" style="display: none;">
                            @include('questions.multiple_create')
                        </div>

                        <div id="falseDiv" style="display: none;">
                            @include('questions.false_create')
                        </div>

                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-info btn-q btn-lg"> 确定 </button>
                            <a href="/questionBanks/{{ $id }}/questions" class="btn btn-default btn-q btn-lg"> 取消 </a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


@endsection
