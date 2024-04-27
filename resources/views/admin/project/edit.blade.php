@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã dự án</label>
                    <input type="text" name="full_name" value="{{$project->code}}" class="form-control" placeholder="Nhập họ và tên">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên dự án</label>
                            <input type="text" name="phone_number"  value="{{$project->project_name}}" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="address"  value="{{$project->description}}" class="form-control" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label>Tên công ty</label>
                    <select class="form-control" name ="company_id">
                        <option value="0">Trống</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}" {{$person->company_id==$company->id?'selected':''}}>
                                {{$company->name}}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>

    </div>
@endsection





