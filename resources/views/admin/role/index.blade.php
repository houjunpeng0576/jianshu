@extends('admin.layout.main')
@section('content')
    <a class="btn btn-warning" style="margin-left: 15px" href="/admin/roles/create"><i class="icon-plus icon-white"></i> 新增角色</a>
    <div class="widget-body">

        <table class="table table-striped table-bordered table-advance table-hover" id="table">
            <thead>
            <tr>
                <th><i></i> ID</th>
                <th><i></i> 角色名称</th>
                <th><i></i> 角色描述</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a href="/admin/roles/{{$role->id}}/permission" class="btn btn-success post-audit"><i></i> 权限管理</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $roles->links('pagination.admin', ['foo' => 'bar']) }}
    </div>
@endsection