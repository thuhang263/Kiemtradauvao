@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã phòng ban </label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã quốc gia">
                </div>
                <div class="form-group">
                    <label>Tên phòng ban</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên quốc gia">
                </div>

                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name ="parent_department_id">
                        <option value="0">Thư mục cha</option>
                        @foreach($departments as $department)
                            <option value="{{$department->parent_department_id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Tên công ty</label>
                    <select class="form-control" name ="company_id">
                        <option value="0">Trống</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
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




