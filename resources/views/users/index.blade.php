@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nhân viên</h1>
        <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm create_employee">Thêm nhân
            viên</button>
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
                            <th>Ảnh</th>
                            <th>Chức vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('users/' . $user->image) }}" alt="" style="width: 50px; height: 50px">
                                </td>
                                <td>{{ $user->group->name ?? "Chưa cấp"}}</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <a href="{{ route('user.edit', $user->id) }}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span
                                            class="sr-only">Remove</span></a>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" title="Xóa" class="btn btn-sm btn-icon btn-secondary" onclick="confirmDelete({{ $user->id }})">
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

    <div class="modal fade" id="modal_create_employee" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Thêm Nhân Viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-modal" enctype="multipart/form-data">
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                        <!-- Move your form content inside the modal-body -->
                        <div class="form-row">
                            <!-- Your form fields -->
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập Email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="group">Chức vụ</label>
                                <select id="group" name="group_id" class="form-control">
                                <option selected>Vui lòng chọn</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputAddress">Tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập tên">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAddress">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAddress2">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại"
                                    name="phone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="image">Hình ảnh</label>
                                <input name="image" value="" type="file" class="form-control" id="image">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="create_employee_button" type="button" class="btn btn-primary">Thêm Nhân Viên</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // $.ajax({
            //     url: "{{route('user.create')}}",
            //     success: function(response) {
            //         document.querySelector('#dataTable tbody').innerHTML = response;

            //         console.log(response);
            //     }
            // })
            //rfgrfg
            $('.create_employee').on('click', function(e) {
                e.preventDefault();
                $('#modal_create_employee').modal('show');
            })

            $('#create_employee_button').on('click', function(e) {
                e.preventDefault();

                var formData = new FormData($('#form-modal')[0]);
                var fileInput = $('#image')[0].files[0];

                if (fileInput) {
                    formData.append('image', fileInput);
                }

                $.ajax({
                    url: "{{ route('user.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Thêm nhân viên thành công!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(error) {
                        Swal.fire('Thất bại', 'Có lổi xảy ra, vui lòng thử lại!', 'warning');
                    }
                })
            })
        })
    </script>
@endsection
