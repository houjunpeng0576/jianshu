@extends('admin.layout.main')
@section('content')
    <div class="row-fluid">
        <div class="span12">
            <h3>权限列表</h3>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <form action="/admin/roles/{{$role->id}}/permission" method="POST">
                {{csrf_field()}}
                @foreach($permissions as $permission)
                    <label class="checkbox line">
                        <input type="checkbox" value="{{$permission->id}}" name="permission_ids[]"
                               @if($myPermissions->contains($permission))
                               checked
                                @endif
                        /> {{$permission->name}}
                    </label>
                @endforeach
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
            </form>
        </div>
    </div>
@endsection