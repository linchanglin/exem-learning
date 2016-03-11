@extends('app')
@section('content')
    <h2>进行中的考试</h2>
    <hr>
    @foreach($exams as $exam)
        <div>
            <span class="h4">{{ $exam->title}}</span>
            <a href="/lessons/{{ $exam->id }}/exam" class="btn btn-info btn-q"> 开始考试 </a>
        </div>
        <hr>
    @endforeach


@endsection