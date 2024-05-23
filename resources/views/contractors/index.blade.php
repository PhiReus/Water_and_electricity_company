@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nhà thầu</h1>
        <a href="{{ route('contractors.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Thêm nhà thầu</a>
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
                            <th>E-mail</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contractors as $key => $contractor)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $contractor->name }}</td>
                                <td>{{ $contractor->email }}</td>
                                <td>{{ $contractor->phone }}</td>
                                <td>{{ $contractor->address }}</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <a href="{{ route('contractors.edit', $contractor->id) }}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span
                                            class="sr-only">Remove</span></a>
                                    <form id="delete-form-{{ $contractor->id }}" action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" title="Xóa" class="btn btn-sm btn-icon btn-secondary" onclick="confirmDelete({{ $contractor->id }})">
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
