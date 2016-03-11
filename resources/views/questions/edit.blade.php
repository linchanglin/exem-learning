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
                    编辑题目
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">



                    <form  role="form" method="POST" action="/questionBanks/{{ $id }}/questions/{{ $question->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="question_bank_id" value="{{ $id }}">

                        <div class="form-group">
                            <label for="questionId" class="h4">题目ID</label>
                            <input type="text" class="form-control" name="questionId" value="{{ $question->questionId }}">
                        </div>
                        <div class="form-group">
                            <label for="question" class="h4">题目</label>
                            <textarea class="form-control" name="question" rows="6">{{ $question->question }}</textarea>
                        </div>
                        <div class="form-group">
                            <span class="h5">分配题目时是否优先:&nbsp&nbsp&nbsp</span>
                            <label class="radio-inline">
                                <input type="radio" name="priority" id="" value="1" @if( $question->priority == 1 ) checked @endif > 是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="priority" id="" value="0" @if( $question->priority == 0 ) checked @endif> 否
                            </label>
                        </div>
                        <hr>

                        <div id="listNum">
                            <input type="hidden" id="radioNum" name="radioNum" value="{{ count($question->questionSelects) }}">
                            <input type="hidden" id="multipleNum" name="multipleNum" value="{{ count($question->questionSelects) }}">
                        </div>

                        @if( $question->questionType == "单选题" )
                            <input type="hidden" name="questionType" value="单选题">
                            @include('questions.radio_edit')
                        @endif

                        @if( $question->questionType == "多选题" )
                            <input type="hidden" name="questionType" value="多选题">
                            @include('questions.multiple_edit')
                        @endif

                        @if( $question->questionType == "是非题" )
                            <input type="hidden" name="questionType" value="是非题">
                            @include('questions.false_edit')
                        @endif

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
