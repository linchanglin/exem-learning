@extends('app')
@section('content')
    <h2>已完成的考试</h2>
    <hr>
    @foreach($exams as $exam)
        <div>
            <span class="h4">{{ $exam->title}}</span>
            <a href="/lessons/{{ $exam->id }}/examDone" class="btn btn-info btn-q"> 查看考试 </a>
        </div>
        <hr>
    @endforeach


@endsection