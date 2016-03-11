@extends('app')
@section('content')

    <div id="page-container">
        <div class="leftpanel">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/questionBanks/{{ $id }}/edit">题库管理</a></li>
                <li class="active"><a href="/questionBanks/{{ $id }}/questions">题目管理</a></li>
                <li><a href="/questionBanks/{{ $id }}">预览</a></li>
                <li><a href="/questionBanks">返回</a></li>
            </ul>
        </div>
        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">




                    <div>
                        <a class="btn btn-info btn-lg" href="#" role="button">选择目录</a>
                    </div>
                    <div>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="请输入要搜索的考试名">
                            </div>
                            <button type="submit" class="btn btn-info">搜索</button>
                        </form>
                        <div class="pull-right">
                            <a href="/questionBanks/{{ $id }}/questions/create" class="btn btn-normal btn-info">添加新题目</a>
                        </div>
                    </div>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>题目ID</th>
                            <th>题目</th>
                            <th>类型</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($questions as $question)
                        <tr>
                        <td>{{ $question->questionId }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->questionType }}</td>
                        <td>

                        <form class="form-horizontal" role="form" method="POST" action="/questionBanks/{{ $id }}/questions/{{ $question->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-info" href="/questionBanks/{{ $id }}/questions/{{ $question->id }}/edit">编辑</a>
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                    </table>





                </div>
            </div>
        </div>
    </div>

@endsection


