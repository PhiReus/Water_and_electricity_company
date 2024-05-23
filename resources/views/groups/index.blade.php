@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chức vụ</h1>
        <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm create_group">Thêm chức vụ</button>
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
                            <th>Nhân sự</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $key => $group)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $group->name }}</td>
                                <td>Hiện có {{ count($group->users) }} người</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <button id="edit_group" group_id="{{ $group->id}}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i>
                                        <span class="sr-only">Remove</span></button>
                                    <form id="delete-form-{{ $group->id }}" action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" title="Xóa" class="btn btn-sm btn-icon btn-secondary" onclick="confirmDelete({{ $group->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <a class="btn btn-sm btn-icon btn-secondary"
                                            href="{{ route('groups.show', $group->id) }}" title="Cấp quyền">
                                            <i class="fa-solid fa-user-tie"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="modal_create_group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm chức vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="inputGroup">Chức vụ:</label>
                            <input type="text" class="form-control" id="inputPosition" name="group" placeholder="Nhập chức vụ">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="save_group">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa chức vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="inputGroup">Chức vụ:</label>
                            <input type="text" class="form-control" id="inputPosition" name="group_edit" placeholder="Nhập chức vụ">
                            <input type="hidden" id="modal_group_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="save_edit_group">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>


      <script>
        $(document).ready(function() {
            $('.create_group').on('click', function(e) {
                e.preventDefault();
                $('#modal_create_group').modal('show');
            })

            $('#save_group').on('click', function(e) {
                e.preventDefault();

                var group = $('input[name=group]').val();
                $.ajax({
                    url: "{{ route('groups.store') }}",
                    type: "POST",
                    data: {name: group},
                    success: function(response) {
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Thêm chức vụ thành công!',
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

        $(document).on('click', '#edit_group', function(e) {
            e.preventDefault();
            $('#modal_edit_group').modal('show');
            var groupId = $(this).attr('group_id');
            $('#modal_group_id').val(groupId);

            getGroup(groupId);
        })

        $('#save_edit_group').on('click', function(e) {
            var groupId = $('#modal_group_id').val();
            editGroup(groupId);
            console.log(groupId);
        })

        function getGroup(groupId) {
            $.ajax({
                url: "{{ route('groups.getGroup') }}",
                type: "POST",
                data: {group_id: groupId},
                success: function(response) {
                    var res = JSON.parse(response)
                    if(res.name !== null){
                        $('#modal_edit_group input[name=group_edit]').val(res.name);
                    }else{
                        $('input[name=group_edit]').val('');
                    }
                }
            })
        }

        function editGroup(groupId) {
            var name = $('#modal_edit_group input[name=group_edit]').val();
            $.ajax({
                url: "{{ route('groups.update', ['group' => ':group']) }}".replace(':group', groupId),
                type: "PUT",
                data: {name: name},
                success: function(response) {
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Sửa chức vụ thành công!',
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
        }
    </script>

@endsection
