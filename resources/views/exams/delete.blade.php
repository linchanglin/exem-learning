@extends('app')
@section('content')

    <div id="page-container">

        @include('exams.partials.leftpanel')

        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    {{ $exam->title }}
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">
                    <p><span>考试编号</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $exam->examId }}</span></p>
                    <p><span>考试标题</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $exam->title }}</span></p>
                    <p><span>用户对象</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $exam->examId }}</span></p>
                    <p><span>题库目录</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@for($i = 0;$i <$QBnum;$i ++)<span>{{ $selectQB[$i] }}
                            &nbsp;&nbsp;&nbsp;</span>@endfor</p>
                    <p><span>创建时间</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $exam->created_at }}</span></p>
                    <p><span>更新时间</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $exam->updated_at }}</span></p>
                </div>
                <form action="/exams/{{ $id }}/delete/destroy" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group form-group-lg text-center">
                        <button type="submit" class="btn btn-danger btn-q btn-lg">删除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
