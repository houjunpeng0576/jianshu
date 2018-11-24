@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>添加专题</h3>
        </div>
    </div>
    <form action="/admin/topics" class="form-horizontal" method="POST">
        {{csrf_field()}}
        <div class="control-group">
            <label class="control-label">专题名称</label>
            <div class="controls">
                <input type="text" placeholder="请输入专题名称" class="input-xlarge" name="name"/>
            </div>
        </div>
        @include('layout.error')
        <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
    </form>
@endsection