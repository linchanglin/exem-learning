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
                    <form method="POST" action="/exams/{{ $id }}/combinate">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>题库名</th>
                                <th>题目数</th>
                                <th>已选题目</th>
                                <th>权重</th>
                            </tr>


                            @foreach($exam->examCombinates as $combinate)
                                <tr>
                                    <td>{{ $combinate->questionBank->questionBank }}</td>
                                    <td>{{ count($combinate->questionBank->questions) }}</td>
                                    <td>
                                        <div class="input-group" style="width: 200px;">
                                            <input type="text" name="questionNum{{ $combinate->question_bank_id }}" class="form-control" value="{{ $combinate->questionNum }}">
                                            <span class="input-group-addon">题</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 200px;">
                                            <input type="text" name="percent{{ $combinate->question_bank_id }}" class="form-control" value="{{ $combinate->percent }}">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @foreach($unQuestionBanks as $questionBank)
                                <tr>
                                    <td>{{ $questionBank->questionBank }}</td>
                                    <td>{{ count($questionBank->questions) }}</td>
                                    <td>
                                        <div class="input-group" style="width: 200px;">
                                            <input type="text" name="questionNum{{ $questionBank->id }}" class="form-control" value="0">
                                            <span class="input-group-addon">题</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 200px;">
                                            <input type="text" name="percent{{ $questionBank->id }}" class="form-control" value="0">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach




                        </table>

                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-info btn-q btn-lg"> 确定</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection