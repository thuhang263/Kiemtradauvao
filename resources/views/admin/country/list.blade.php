@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã code</th>
            <th>Tên Quốc Gia</th>
            <th>Mô tả chung</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $key => $country)
            <tr>
                <td>{{$country->id}}</td>
                <td>{{ $country->code}}</td>
                <td>{{ $country->name}}</td>
                <td>{{ $country->description}}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/countries/edit/{{$country->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$country->id}},'/countries/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $countries->links() !!}
@endsection


