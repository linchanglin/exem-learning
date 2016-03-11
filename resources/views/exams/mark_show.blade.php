@extends('app')
@section('content')

    <div id="page-container">
        @include('exams.partials.leftpanel')
        <div class="mainpanel">

            <div class="contentpanel">
                <div class="panel-body">


                    <div class="h4" style="margin-bottom: 20px;">题目</div>
                    <div class="h5">{{ $questions[$grade->question_id]}}</div>
                    <hr>
                    <div class="h4" style="margin-bottom: 20px;">学员答案</div>
                    <div class="h5" style="margin-bottom: 60px;">{{ $grade->answer }}</div>
                    <div style="margin-bottom: 20px;">
                        本题分数!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本题满分:&nbsp;&nbsp;&nbsp;{{ $perfectScore }}</div>

                    <form action="/exams/{{ $id }}/mark/{{ $grade->id }}/show/store" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group form-group-lg" style="margin-bottom: 20px;">
                            <input type="text" name="score" class="form-control">
                        </div>

                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-info btn-q btn-lg">提交</button>
                            <a href="/exams/{{ $id }}/mark" class="btn btn-default btn-q btn-lg">返回</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection