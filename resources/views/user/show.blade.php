@extends('layout.main')
@section('js')
    <script type="text/javascript" src="/js/wangEditor.min.js"></script>
@endsection
@section('content')
        <div class="col-sm-8">
            <blockquote>
                <p><img src="/image/user.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>


                <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
                @include('user.fun.fun',['target_user' => $user])
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$user->id}}">{{$user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>
                            {!! str_limit($post->content,100,'...') !!}
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @foreach($susers as $suser)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$suser->name}}</p>
                            <p class="">关注：{{$suser->stars_count}} | 粉丝：{{$suser->fans_count}}｜ 文章：{{$suser->posts_count}}</p>
                            @include('user.fun.fun',['target_user' => $suser])
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        @foreach($fusers as $fuser)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">{{$fuser->name}}</p>
                                <p class="">关注：{{$fuser->stars_count}} | 粉丝：{{$fuser->fans_count}}｜ 文章：{{$fuser->posts_count}}</p>
                            @include('user.fun.fun',['target_user' => $fuser])
                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->
@endsection