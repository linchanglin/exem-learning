@extends('app')
@section('content')

    <div id="page-container">
        <div class="leftpanel">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="">题库管理</a></li>
                <li><a href="/questionBanks/{{ $questionBank->id }}/questions">题目管理</a></li>
                <li><a href="/questionBanks/{{ $questionBank->id }}">预览</a></li>
                <li><a href="/questionBanks">返回</a></li>
            </ul>
        </div>
        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/questionBanks/{{ $questionBank->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group form-group-lg">
                            <label for="questionBank" class="col-sm-3 control-label">题库名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="questionBank" name="questionBank" value="{{ $questionBank->questionBank }}">
                            </div>
                        </div>

                        <div class="form-group form-group-lg">
                            <label for="departments" class="col-sm-3 control-label">所属部门</label>
                            <div class="col-md-6" style="padding-top: 7.5px;">
                                <select name="departments[]" id="departments" class="form-control form-group-lg js-example-basic-multiple" multiple>
                                    @foreach($departments as $id => $department)
                                        <option  @if(in_array($department,$depart)) selected @endif value="{{ $id }}">{{ $department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-info btn-q btn-lg"> 确定 </button>
                            <a href="/questionBanks" class="btn btn-default btn-q btn-lg"> 取消 </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection