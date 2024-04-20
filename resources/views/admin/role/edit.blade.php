@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Vai trò</label>
                    <input type="text" name="role" value="{{$role->role}}" class="form-control" placeholder="nhập tên bài hát">
                </div>
                <div class="form-group">
                    <label >Mô tả chung</label>
                    <textarea name="description" class="form-control">{{$role->description}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




