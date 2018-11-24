@extends('admin.layout.main')
@section('js')
    <script src="/js/admin.js"></script>
@endsection
@section('content')
    <a class="btn btn-warning" style="margin-left: 15px" href="/admin/topics/create"><i class="icon-plus icon-white"></i> 新增专题</a>
    <div class="widget-body">

        <table class="table table-striped table-bordered table-advance table-hover" id="table">
            <thead>
            <tr>
                <th><i></i> ID</th>
                <th><i></i> 专题名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->id}}</td>
                    <td>{{$topic->name}}</td>
                    <td>
                        <a href="#" class="btn btn-danger resource-delete" delete-url="/admin/topics/{{$topic->id}}"><i></i> 删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection