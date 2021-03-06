@extends('app')
@section('content')
    <h2>添加新考试</h2>
    <hr>


    <form class="form-horizontal" method="POST" action="/exams">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">考试编号(必填项)</label>
            <div class="col-sm-8">
                <input type="text" name="examId" required class="form-control">
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">考试标题(必填项)</label>
            <div class="col-sm-8">
                <input type="text" name="title" required class="form-control">
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">考试描述</label>
            <div class="col-sm-8">
                <textarea name="description" required class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">考试时间</label>
            <div class="col-sm-4 input-group input-group-lg">
                <input type="text" name="examTime" class="form-control">
                <span class="input-group-addon">分钟</span>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">限定次数</label>
            <div class="col-sm-4">
                <input type="text" name="limitTimes" class="form-control">
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">过期天数</label>
            <div class="col-sm-4 input-group input-group-lg">
                <input type="text" name="limitDays" class="form-control">
                <span class="input-group-addon">天</span>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">通过分数</label>
            <div class="col-sm-4">
                <input type="text" name="passScore" class="form-control">
            </div>
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div class="form-group form-group-lg">
            <label for="departments" class="col-sm-3 control-label">选择对象</label>
            <div class="col-md-6" style="padding-top: 7.5px;">
                <select name="departments[]" id="departments" class="form-control js-example-basic-multiple" multiple>
                    @foreach($departments as $id => $department)
                        <option  value="{{ $id }}">{{ $department }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{--<div class="form-group form-group-lg">--}}
            {{--<label for="input1" class="col-sm-3 control-label">用户对象</label>--}}
            {{--<div class="btn-group btn-group-lg">--}}
                {{--<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--选择对象 <span class="caret"></span>--}}
                {{--</button>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Action</a></li>--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group form-group-lg">
            <label for="input1" class="col-sm-3 control-label">目录(必填项)</label>
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    选择目录 <span class="caret"></span>
                </button>
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Action</a></li>--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                {{--</ul>--}}
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">是否发送邮件提醒</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked value="true">
                </label>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label">是否允许关联到课程</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked value="true">
                </label>
                <span class="h5">如果勾选此选项，该考试不能被分配</span>
            </div>
        </div>

        <div class="form-group form-group-lg text-center">
                <button type="submit" class="btn btn-info btn-q btn-lg"> 确定 </button>
                <a href="/exams" class= "btn btn-default btn-q btn-lg"> 取消 </a>
        </div>
    </form>


@endsection