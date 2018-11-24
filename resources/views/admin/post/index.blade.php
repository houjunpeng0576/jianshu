@extends('admin.layout.main')

@section('js')
    <script src="/js/admin.js"></script>
@endsection

@section('content')
    <div class="widget-body">

        <table class="table table-striped table-bordered table-advance table-hover" id="table">
            <thead>
            <tr>
                <th><i></i> ID</th>
                <th><i></i> 标题</th>
                <th><i></i> 创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <button href="#" class="btn btn-success post-audit" post-id="{{$post->id}}" post-action-status="1"><i></i> 通过</button>
                        <button href="#" class="btn btn-danger post-audit" post-id="{{$post->id}}" post-action-status="-1"><i></i> 未通过</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $posts->links('pagination.admin', ['foo' => 'bar']) }}
    </div>
@endsection