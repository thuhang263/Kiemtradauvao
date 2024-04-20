@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập password">
                </div>
                <div class="form-group">
                    <label >Trạng thái hoạt động</label>
                    <input type="text" name="is_active" class="form-control" placeholder="Nhập trạng thái hoạt động">
                </div>
                <div class="form-group">
                    <label >Vai trò</label>
                    <select class="form-control" name ="role">
                        <option value="0">Trống</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




