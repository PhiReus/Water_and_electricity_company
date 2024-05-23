@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dự án</h1>
        <a href="{{ route('projects.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm create_employee">Thêm dự án</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Nhà thầu</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Ảnh</th>
                            <th>Địa điểm thi công</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $key => $project)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ format_Date($project->start_day) }}</td>
                                <td>{{ format_Date($project->end_day) }}</td>
                                <td>{{ $project->contractor->name ?? 'Không có'}}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('users/' . $project->image) }}" alt="" style="width: 50px; height: 50px">
                                </td>
                                <td>{{ $project->construction_site }}</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <a href="{{ route('projects.edit', $project->id) }}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span
                                            class="sr-only">Remove</span></a>
                                    <form id="delete-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" title="Xóa" class="btn btn-sm btn-icon btn-secondary" onclick="confirmDelete({{ $project->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
