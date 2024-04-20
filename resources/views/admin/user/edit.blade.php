@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" value="{{$user->password}}" class="form-control" >
                </div>

                <div class="form-group">
                    <label >Hoạt động</label>
                    <textarea name="is_active" class="form-control">{{$user->is_active}}</textarea>
                </div>
                <div class="form-group">
                    <label >Vai trò</label>
                    <textarea name="role" class="form-control">{{$user->role}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




