@extends('admin.layout.main')
@section('content')
    <a class="btn btn-warning" style="margin-left: 15px" href="/admin/notices/create"><i class="icon-plus icon-white"></i> 新增通知</a>
    <div class="widget-body">

        <table class="table table-striped table-bordered table-advance table-hover" id="table">
            <thead>
            <tr>
                <th><i></i> ID</th>
                <th><i></i> 通知标题</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notices as $notice)
                <tr>
                    <td>{{$notice->id}}</td>
                    <td>{{$notice->title}}</td>
                    <td>
                        <a href="/admin/notices/{{$notice->id}}/permission" class="btn btn-success post-audit"><i></i> ...</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{{ $notice->links('pagination.admin', ['foo' => 'bar']) }}--}}
    </div>
@endsection