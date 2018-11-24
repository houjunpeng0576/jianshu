@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>添加用户</h3>
        </div>
    </div>
<form action="/admin/users/create" class="form-horizontal" method="POST">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">用户名</label>
        <div class="controls">
            <input type="text" placeholder="请输入用户名" class="input-xlarge" name="username"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">密码</label>
        <div class="controls">
            <input type="password" placeholder="请输入密码" class="input-xlarge" name="password"/>
        </div>
    </div>
    @include('layout.error')
    <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
</form>
@endsection