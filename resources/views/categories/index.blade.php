@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
        <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm create_category">Thêm danh
            mục</button>
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
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <button id="edit_category"
                                        category_id="{{ $category->id }}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i>
                                        <span class="sr-only">Remove</span></button>
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" title="Xóa" class="btn btn-sm btn-icon btn-secondary" onclick="confirmDelete({{ $category->id }})">
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

    <!-- Modal -->
    <div class="modal fade" id="modal_create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-category">
                            <label for="inputcategory">Danh mục:</label>
                            <input type="text" class="form-control" id="inputPosition" name="category"
                                placeholder="Nhập danh mục">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="save_category">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-category">
                            <label for="inputcategory">Danh mục:</label>
                            <input type="text" class="form-control" id="inputPosition" name="category_edit"
                                placeholder="Nhập danh mục">
                            <input type="hidden" id="modal_category_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="save_edit_category">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.create_category').on('click', function(e) {
                e.preventDefault();
                $('#modal_create_category').modal('show');
            })

            $('#save_category').on('click', function(e) {
                e.preventDefault();

                var category = $('input[name=category]').val();

                $.ajax({
                    url: "{{ route('categories.store') }}",
                    type: "POST",
                    data: {
                        name: category
                    },
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

        $(document).on('click', '#edit_category', function(e) {
            e.preventDefault();
            $('#modal_edit_category').modal('show');
            var categoryId = $(this).attr('category_id');
            $('#modal_category_id').val(categoryId);

            getCategory(categoryId);
        })

        $('#save_edit_category').on('click', function(e) {
            var categoryId = $('#modal_category_id').val();
            editCategory(categoryId);
            console.log(categoryId);
        })

        function getCategory(categoryId) {
            $.ajax({
                url: "{{ route('categories.getCategory') }}",
                type: "POST",
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    var res = JSON.parse(response)
                    if (res.name !== null) {
                        $('#modal_edit_category input[name=category_edit]').val(res.name);
                    } else {
                        $('input[name=category_edit]').val('');
                    }
                }
            })
        }

        function editCategory(categoryId) {
            var name = $('#modal_edit_category input[name=category_edit]').val();
            $.ajax({
                url: "{{ route('categories.update', ['category' => ':category']) }}".replace(':category',
                    categoryId),
                type: "PUT",
                data: {
                    name: name
                },
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
