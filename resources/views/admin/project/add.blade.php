@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã dự án</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã dự án">
                </div>
                <div class="form-group">
                    <label>Tên dự án</label>
                    <input type="text" name="project_name" class="form-control" placeholder="Nhập tên dự án">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" name="description" class="form-control" placeholder="Nhập mô tả">
                </div>
                <div class="form-group">
                    <label>Tên công ty</label>
                    <select class="form-control" name ="company_id">
                        <option value="0">Trống</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên công ty</label>
                    <select class="form-control" name ="company_id">
                        <option value="0">Trống</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id == $company_id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tên nhân viên</label>

                    <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
