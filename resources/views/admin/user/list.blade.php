@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Email</th>
            <th>Trạng thái hoạt động</th>
            <th>Vai trò</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{$user->email}}</td>
                <td>{{ $user->is_active}}</td>
                <td>
                    {{ $user->role }}
                </td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/users/edit/{{$user->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$user->id}},'/users/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
