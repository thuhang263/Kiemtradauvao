@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã công ty</th>
            <th>Tên công ty</th>
            <th>Địa chỉ</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $key => $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{ $company->name}}</td>
                <td>{{ $company->code}}</td>
                <td>{{ $company->address}}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/companies/edit/{{$company->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$company->id}},'/companies/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection



