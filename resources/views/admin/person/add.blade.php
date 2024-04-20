@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Nhập họ và tên">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <input type="text" name="gender" class="form-control" placeholder="Nhập giới tính">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Năm sinh</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Nhập năm sinh">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Nhập số điện thoại">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Tên tài khoản</label>
                        <select class="form-control" name ="user_id">
                            <option value="0">Trống</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->email}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Tên công ty</label>
                        <select class="form-control" name ="company_id">
                            <option value="0">Trống</option>
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            @csrf
        </form>

    </div>
@endsection




