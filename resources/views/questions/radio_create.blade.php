@for($i = 1;$i <= 2;$i++ )
    <div class="form-group">
        <p class="h5" style="margin-left: 0px;">选项{{ $i }}</p>
        <label>
            <input type="radio" name="ifTrue" value="{{ $i }}"> 正确
        </label>
        <div>
            <input type="text" class="form-control" name="title{{ $i }}" value="选项{{ $i }}" placeholder="选项{{ $i }}">
        </div>
    </div>
    <hr>
@endfor

<div id="radioPlace">
</div>



<div class="text-right">
    <button type="button" class="btn btn-info" onclick="addRadio()">
        添加选项
    </button>
</div>
