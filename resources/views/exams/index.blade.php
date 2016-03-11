@extends('app')
@section('content')
    <h2>考试管理</h2>
    <hr>
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
           <a href="/exams/create" class="btn btn-normal btn-info">添加新考试</a>
       </div>
   </div>
    <table class="table table-bordered text-center">
        <tr class="text-center">
            <th>考试标题</th>
            <th>考试描述</th>
            <th>操作</th>
        </tr>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->description }}</td>
                <td>
                    <a class="btn btn-info" href="exams/{{ $exam->id }}/edit">编辑</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection