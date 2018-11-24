@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>角色列表</h3>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <form action="/admin/users/{{$user->id}}/role" method="POST">
                {{csrf_field()}}
                @foreach($roles as $role)
                    <label class="checkbox line">
                        <input type="checkbox" value="{{$role->id}}" name="role_ids[]"
                               @if($myRoles->contains($role))
                                   checked
                               @endif
                        /> {{$role->name}}
                    </label>
                @endforeach
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </form>
        </div>
    </div>
@endsection