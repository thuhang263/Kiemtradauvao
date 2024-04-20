@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Vai trò</th>
            <th>Mô tả chung</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key => $role)
            <tr>
                <td>{{ $role->role}}</td>
                <td>{{ $role->description}}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/roles/edit/{{$role->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$role->id}},'/roles/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


