@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên công ty</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên công ty">
                </div>

                <div class="form-group">
                    <label>Mã công ty</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã công ty">
                </div>

                <div class="form-group">
                    <label >Địa chỉ</label>
                    <input name="address" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>
    </div>
@endsection




