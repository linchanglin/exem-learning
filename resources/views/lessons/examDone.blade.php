@extends('app')
@section('content')

    <div id="page-container">


        <div class="centerpanel">
            <div class="contentpanel">
                <div class="panel-body">
                  <span>{{ $exam->title }}</span>
                    <span style="float: right;color: #2aabd2;" class="h4">{{ $score }}</span>
                </div>
            </div>

            <div class="contentpanel">


                    <div class="panel-body">
                        <div style="border-bottom: solid 20px #efefef;"></div>
                        @for($i = 1;$i <= count($questions);$i ++)
                            <div>
                                <h5 style="color: #337ab7;">{{ $i }}.{{ $questions[$i-1]->question }}</h5>
                                @if($questions[$i-1]->questionType == '单选题')
                                    @for($j = 1;$j <= count($questions[$i-1]->questionSelects);$j ++)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="question{{ $questions[$i-1]->id }}" @if( in_array($questions[$i-1]->questionSelects[$j-1]->id,$choosedSelectIds) ) checked @endif>
                                                {{ $questions[$i-1]->questionSelects[$j-1]->title }}
                                            </label>
                                        </div>
                                    @endfor
                                @endif

                                @if($questions[$i-1]->questionType == '多选题')
                                    @for($j = 1;$j <= count($questions[$i-1]->questionSelects);$j ++)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="question{{ $questions[$i-1]->id }}[]" @if( in_array($questions[$i-1]->questionSelects[$j-1]->id,$choosedSelectIds) ) checked @endif>
                                                {{ $questions[$i-1]->questionSelects[$j-1]->title }}
                                            </label>
                                        </div>
                                    @endfor
                                @endif

                                @if($questions[$i-1]->questionType == '是非题')
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="question{{ $questions[$i-1]->id }}" @if($QIfTrue[$questions[$i-1]->id] == 1) checked @endif>&nbsp&nbsp&nbsp正确
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="question{{ $questions[$i-1]->id }}" @if($QIfTrue[$questions[$i-1]->id] == 0) checked @endif>&nbsp&nbsp&nbsp错误
                                        </label>
                                    </div>
                                @endif

                                @if($questions[$i-1]->questionType == '简答题')
                                    <textarea class="form-control" rows="3" name="question{{ $questions[$i-1]->id }}">{{ $answer[$questions[$i-1]->id] }}</textarea>
                                @endif


                            </div>
                        @endfor
                    </div>


            </div>
        </div>
    </div>

@endsection
