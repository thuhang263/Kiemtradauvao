@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Mã dự án</th>
            <th>Tên dự án</th>
            <th>Mô tả</th>
            <th>Tên công ty</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $key => $project)
            <tr>
                <td>{{$project->code}}</td>
                <td>{{ $project->project_name}}</td>
                <td>{{ $project->description}}</td>
                <td>{{ $project->company ? $project->company->name : 'Không' }}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/projects/edit/{{$project->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$project->id}},'/projects/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection



