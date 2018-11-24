@extends('admin.layout.main')
@section('content')
<a class="btn btn-warning" style="margin-left: 15px" href="/admin/users/create"><i class="icon-plus icon-white"></i> 新增用户</a>

<div class="widget-body">

    <table class="table table-striped table-bordered table-advance table-hover" id="table">
        <thead>
        <tr>
            <th><i class="icon-user"></i> 用户名</th>
            <th><i class="icon-time"></i> 创建时间</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td class="highlight">
                <a href="#">{{$user->username}}</a>
            </td>
            <td class="hidden-phone">{{$user->created_at}}</td>
            <td>
                <a href="#" class="btn mini purple"><i class="icon-edit"></i> 修改</a>
                <a href="/admin/users/{{$user->id}}/role" class="btn btn-success post-audit"><i></i>角色管理</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection