@extends('app')
@section('content')

    <div id="page-container">
        @include('exams.partials.leftpanel')

        <div class="mainpanel">
            <div class="contentpanel">
                <div class="panel-body">
                    {{ $exam->title }}
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">
                    <form method="POST" action="/exams/{{ $id }}/student/store">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>可关联学员</p>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th><input type="checkbox" id="unCheckUsersButton"></th>
                                <th>用户名</th>
                                <th>姓名</th>
                                <th>部门</th>
                                <th>角色</th>
                            </tr>
                            @foreach($usersUnPivot as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="unCheckUsers" name="student[]" value="{{ $user->id }}">
                                    </td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->department->department }}</td>
                                    <td>{{ $user->role->role }}</td>
                                </tr>
                            @endforeach


                        </table>
                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-info btn-q btn-lg">确定</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="contentpanel">
                <div class="panel-body">
                    <form method="POST" action="/exams/{{ $id }}/student/update">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>已关联学员</p>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th><input type="checkbox" id="checkUsersButton"></th>
                                <th>用户名</th>
                                <th>姓名</th>
                                <th>部门</th>
                                <th>角色</th>
                            </tr>
                            @foreach($usersPivot as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkUsers" name="student[]" value="{{ $user->id }}">
                                    </td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->department->department }}</td>
                                    <td>{{ $user->role->role }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="form-group form-group-lg text-center">
                            <button type="submit" class="btn btn-danger btn-q btn-lg">删除</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>

@endsection