
@extends('admin.main')
@section('content')
    <table class="table">
        <thead>

        <tr>
            <th>Mã phòng ban</th>
            <th>Tên phòng ban</th>
            <th>Tên công ty</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>

        {!! \App\Helpers\Helper::department($departments) !!}

        </tbody>
    </table>


@endsection


