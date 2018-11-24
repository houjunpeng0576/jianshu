@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>添加角色</h3>
        </div>
    </div>
    <form action="/admin/roles/create" class="form-horizontal" method="POST">
        {{csrf_field()}}
        <div class="control-group">
            <label class="control-label">角色名称</label>
            <div class="controls">
                <input type="text" placeholder="请输入角色名称" class="input-xlarge" name="name"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">角色介绍</label>
            <div class="controls">
                <input type="text" placeholder="请输入角色介绍" class="input-xlarge" name="description"/>
            </div>
        </div>
        @include('layout.error')
        <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
    </form>
@endsection