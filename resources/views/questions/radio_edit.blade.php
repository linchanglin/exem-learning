@for($i = 1;$i <= 2;$i++ )
    <div class="form-group">
        <p class="h5" style="margin-left: 0px;">选项{{ $i }}</p>
        <label>
            <input type="radio" name="ifTrue" @if ($question->questionSelects[$i-1]->ifTrue == 1) checked @endif value="{{ $i }}"> 正确
        </label>
        <div>
            <input type="text" class="form-control" name="title{{ $i }}" value="{{ $question->questionSelects[$i-1]->title }}" placeholder="选项{{ $i }}">
        </div>
    </div>
    <hr>
@endfor

<div id="radioPlace">
   @for($i;$i <= count($question->questionSelects);$i ++)
        <div class="form-group" id="radioDiv{{ $i }}">
            <p class="h5" style="margin-left: 0px;">选项{{ $i }}</p>
            <label>
                <input type="radio" name="ifTrue" @if ($question->questionSelects[$i-1]->ifTrue == 1) checked @endif value="{{ $i }}"> 正确
            </label>
            <div>
                <input type="text" class="form-control" name="title{{ $i }}" value="{{ $question->questionSelects[$i-1]->title }}" placeholder="选项{{ $i }}">
            </div>
            <div class="text-right">
                <input type="button" class="btn btn-danger" onclick="delRadio( {{ $i }} )" value="删除">
            </div>
            <hr>
        </div>
    @endfor
</div>

<div class="text-right">
    <button type="button" class="btn btn-info" onclick="addRadio()">
        添加选项
    </button>
</div>
