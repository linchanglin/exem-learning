<div class="form-group">
    <label>
        <input type="radio" name="ifFalseTrue" @if ($question->questionSelects[0]->ifTrue == 1) checked @endif value="1">&nbsp&nbsp&nbsp正确
    </label>
</div>
<div class="form-group">
    <label>
        <input type="radio" name="ifFalseTrue" @if ($question->questionSelects[0]->ifTrue == 0) checked @endif value="0">&nbsp&nbsp&nbsp错误
    </label>
</div>
