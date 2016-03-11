@extends('app')
@section('content')

    <div id="page-container">


        <div class="centerpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    {{ $exam->title }}
                </div>
            </div>

            <div class="contentpanel">

                <form action="/lessons/{{ $id }}/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('exams._preview_examQuestions')
                    <div class="form-group form-group-lg text-center" style="padding-bottom: 60px; padding-top: 30px;">
                        <button type="submit" class="btn btn-info btn-q btn-lg">提交</button>
                        <a href="/lessons" class="btn btn-default btn-q btn-lg">返回</a>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
