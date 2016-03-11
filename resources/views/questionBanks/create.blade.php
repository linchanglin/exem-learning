@extends('app')
@section('content')
    <h2>添加新题库</h2>
    <hr>

    <form class="form-horizontal" role="form" method="POST" action="/questionBanks">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group form-group-lg">
            <label for="questionBank" class="col-sm-3 control-label">题库名</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="questionBank" name="questionBank" autofocus value="">
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label for="departments" class="col-sm-3 control-label">所属部门</label>
            <div class="col-md-6" style="padding-top: 7.5px;">
                <select name="departments[]" id="departments" class="form-control js-example-basic-multiple" multiple>
                    @foreach($departments as $id => $department)
                        <option  value="{{ $id }}">{{ $department }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group form-group-lg text-center">
            <button type="submit" class="btn btn-info btn-q btn-lg"> 确定 </button>
            <a href="/questionBanks" class="btn btn-default btn-q btn-lg"> 取消 </a>
        </div>
    </form>

@endsection