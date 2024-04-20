@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã quốc gia</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã quốc gia">
                </div>
                <div class="form-group">
                    <label>Tên quốc gia</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên quốc gia">
                </div>
                <div class="form-group">
                    <label >Mô tả chung</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>

    </div>
@endsection



