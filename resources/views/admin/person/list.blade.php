@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tài khoản</th>
            <th>Tên công ty</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $key => $person)
            <tr>
                <td>{{$person->full_name}}</td>
                <td>{{ $person->gender}}</td>
                <td>{{ $person->birthdate}}</td>
                <td>{{ $person->phone_number}}</td>
                <td>{{ $person->address}}</td>
                <td>{{ $person->user ? $person->user->email : 'Không' }}</td>
                <td>{{ $person->company ? $person->company->name : 'Không' }}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/people/edit/{{$person->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$person->id}},'/people/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $people->links() !!}
@endsection


