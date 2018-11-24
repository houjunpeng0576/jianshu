@extends('admin.layout.main')
@section('content')
    <a class="btn btn-warning" style="margin-left: 15px" href="/admin/permissions/create"><i class="icon-plus icon-white"></i> 新增权限</a>
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

            @foreach($permissions as $permission)
            <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
            <td>{{$permission->description}}</td>
            <td>
                <a href="#" class="btn btn-success post-audit"><i></i> 权限管理</a>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $permissions->links('pagination.admin', ['foo' => 'bar']) }}
    </div>
@endsection