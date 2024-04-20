@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Vai trò</label>
                    <input type="text" name="role" class="form-control" placeholder="Nhập vai trò">
                </div>
                <div class="form-group">
                    <label >Mô tả chung</label>
                    <textarea name="description" class="form-control" placeholder="Nhập vào mô tả"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




