
@for($i = 1;$i <= 2;$i ++ )
    <div class="form-group">
        <p class="h5" style="margin-left: 0px;">选项{{ $i }}</p>
        <label>
            <input type="checkbox" name="mulIfTrue{{ $i }}" @if ($question->questionSelects[$i-1]->ifTrue == 1) checked @endif value="1"> 正确
        </label>
        <div>
            <input type="text" class="form-control" name="mulTitle{{ $i }}" value="{{ $question->questionSelects[$i-1]->title }}" placeholder="选项{{ $i }}">
        </div>
    </div>
    <hr>
@endfor

<div id="multiplePlace">
    @for($i;$i <= count($question->questionSelects);$i ++ )
        <div class="form-group" id="multipleDiv{{ $i }}">
            <p class="h5" style="margin-left: 0px;">选项{{ $i }}</p>
            <label>
                <input type="checkbox" name="mulIfTrue{{ $i }}" @if ($question->questionSelects[$i-1]->ifTrue == 1) checked @endif value="1"> 正确
            </label>
            <div>
                <input type="text" class="form-control" name="mulTitle{{ $i }}" value="{{ $question->questionSelects[$i-1]->title }}" placeholder="选项{{ $i }}">
            </div>
            <div class="text-right">
                <input type="button" class="btn btn-danger" onclick="delMultiple( {{ $i }} )" value="删除">
            </div>
            <hr>
        </div>
    @endfor
</div>



<div class="text-right">
    <button type="button" class="btn btn-info" onclick="addMultiple()">
        添加选项
    </button>
</div>
