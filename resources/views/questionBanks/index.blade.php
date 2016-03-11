@extends('app')
@section('content')
    <h2>题库名</h2>
    <hr>

    @include('partials.errors')
    @include('partials.success')

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
            <a href="/questionBanks/create" class="btn btn-normal btn-info">添加新题库</a>
        </div>
    </div>
    <table class="table table-bordered text-center">
        <tr>
            <th>题库名</th>
            <th>题目数</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach ($questionBanks as $questionBank)
           <tr>
               <td>{{ $questionBank->questionBank }}</td>
               <td>{{ count($questionBank->questions) }}</td>
               <td>{{ $questionBank->created_at }}</td>
               <td>

                   <form class="form-horizontal" role="form" method="POST" action="questionBanks/{{ $questionBank->id }}">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input name="_method" type="hidden" value="DELETE">

                       <a class="btn btn-info" href="/questionBanks/{{ $questionBank->id }}/edit">编辑</a>
                       <button type="submit" class="btn btn-danger">删除</button>
                   </form>
               </td>
           </tr>
        @endforeach
    </table>

    {!! $questionBanks->links() !!}

@endsection

















