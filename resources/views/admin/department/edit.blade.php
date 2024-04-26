@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" name="code" value="{{$department->code}}" class="form-control" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" name="name" value="{{$department->name}}" class="form-control" placeholder="Nhập tên danh mục">
                </div>

                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name ="parent_department_id">
                        <option value="0" {{$department ->parent_department_id === 0 ? 'selected' : ''}}>Danh mục cha</option>
                        @foreach($departments as $departmentParent)
                            <option value="{{$departmentParent->id}}"
                                {{$department ->parent_department_id === $departmentParent->id ? 'selected' : ''}}>
                                {{$departmentParent->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Công ty</label>
                    <select class="form-control" name ="company_id">
                        <option value="0">trống</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}" {{$department->company_id==$company->id?'selected':''}}>
                                {{$company->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
            </div>
            @csrf
        </form>

    </div>
@endsection

