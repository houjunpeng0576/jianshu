@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>添加通知</h3>
        </div>
    </div>
    <form action="/admin/notices" class="form-horizontal" method="POST">
        {{csrf_field()}}
        <div class="control-group">
            <label class="control-label">通知标题</label>
            <div class="controls">
                <input type="text" placeholder="请输入通知标题" class="input-xlarge" name="title"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">通知内容</label>
            <div class="controls">
                <textarea class="input-xxlarge" rows="3" placeholder="请输入通知内容" name="content"></textarea>
            </div>
        </div>
        @include('layout.error')
        <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
    </form>
@endsection