@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên công ty</label>
                    <input type="text" name="name" value="{{$company->name}}" class="form-control" placeholder="Nhập tên ca sĩ">
                </div>

                <div class="form-group">
                    <label>Mã công ty</label>
                    <input type="text" name="code" value="{{$company->code}}" class="form-control" placeholder="nhập tên bài hát">
                </div>

                <div class="form-group">
                    <label >Địa chỉ</label>
                    <textarea name="address" class="form-control">{{$company->address}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




