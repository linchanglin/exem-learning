@extends('app')
@section('content')

    <div id="page-container">
        <div class="leftpanel">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/questionBanks/{{ $id }}/edit">题库管理</a></li>
                <li><a href="/questionBanks/{{ $id }}/questions">题目管理</a></li>
                <li class="active"><a href="/questionBanks/{{ $id }}">预览</a></li>
                <li><a href="/questionBanks">返回</a></li>
            </ul>
        </div>
        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    预览
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">

                    <div style="border-bottom: solid 20px #efefef;">{{ $questionBank->questionBank }}</div>
                    @for($i = 1;$i <= count($questions);$i ++)
                        <div>
                            <h5 style="color: #337ab7;">{{ $i }}.{{ $questions[$i-1]->question }}</h5>
                            @if($questions[$i-1]->questionType == '单选题')
                                @for($j = 1;$j <= count($questions[$i-1]->questionSelects);$j ++)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="radios">
                                            {{ $questions[$i-1]->questionSelects[$j-1]->title }}
                                        </label>
                                    </div>
                                @endfor
                            @endif

                            @if($questions[$i-1]->questionType == '多选题')
                                @for($j = 1;$j <= count($questions[$i-1]->questionSelects);$j ++)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="mutiples">
                                            {{ $questions[$i-1]->questionSelects[$j-1]->title }}
                                        </label>
                                    </div>
                                @endfor
                            @endif

                            @if($questions[$i-1]->questionType == '是非题')
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="ifFalseTrue" value="1">&nbsp&nbsp&nbsp正确
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="ifFalseTrue" value="0">&nbsp&nbsp&nbsp错误
                                        </label>
                                    </div>
                            @endif

                            @if($questions[$i-1]->questionType == '简答题')
                                <textarea class="form-control" rows="3"></textarea>
                            @endif



                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>


@endsection
