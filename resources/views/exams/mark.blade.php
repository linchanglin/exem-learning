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


                    <p>阅卷</p>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>用户名</th>
                            <th>姓名</th>
                            <th>题目</th>
                            <th>操作</th>
                        </tr>
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{ $grade->examResult->user_id }}</td>
                                <td>{{ $users[$grade->examResult->user_id] }}</td>
                                <td>{{ $questions[$grade->question_id] }}</td>
                                <td>
                                    <a class="btn btn-info" href="/exams/{{ $id }}/mark/{{ $grade->id }}/show">阅卷</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection