@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã quốc gia</label>
                    <input type="text" name="code" value="{{$country->code}}" class="form-control" placeholder="nhập tên bài hát">
                </div>
                <div class="form-group">
                    <label>Tên quốc gia</label>
                    <input type="text" name="name" value="{{$country->name}}" class="form-control" placeholder="Nhập tên ca sĩ">
                </div>

                <div class="form-group">
                    <label >Mô tả chung</label>
                    <textarea name="description" class="form-control">{{$country->description}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>

    </div>
@endsection



