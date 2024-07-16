@extends('layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script>
    'use strict';
    const formDataStore = new FormData();
    const formDataUpdate = new FormData();

    var formRepeater1 = $('.form-repeater-1'), formRepeater2 = $('.form-repeater-2');
    // Form Repeater
    if (formRepeater1.length) {
        var row = 2;
        var col = 1;
        formRepeater1.on('submit', function (e) {
            e.preventDefault();
        });
        formRepeater1.repeater({
            show: function () {
                var fromControl = $(this).find('.form-control');
                var formLabel = $(this).find('.form-label');

                fromControl.each(function (i) {
                    var id = 'form-repeater-' + row + '-' + col;
                    $(fromControl[i]).attr('id', id);
                    $(formLabel[i]).attr('for', id);
                    col++;
                });

                row++;
                $(this).slideDown();
                $('.select2-container').remove();
                $('.select2.form-select').select2({
                    placeholder: 'Placeholder text'
                });
                $('.select2-container').css('width', '100%');
                $('.form-repeater:first .form-select').select2({
                    dropdownParent: $(this).parent(),
                    placeholder: 'Placeholder text'
                });
                $('.position-relative .select2').each(function () {
                    $(this).select2({
                        dropdownParent: $(this).closest('.position-relative')
                    });
                });
            }

        });
    }

    if (formRepeater2.length) {
        var row = 2;
        var col = 1;
        formRepeater2.on('submit', function (e) {
            e.preventDefault();
        });
        formRepeater2.repeater({
            show: function () {
                var fromControl = $(this).find('.form-control');
                var formLabel = $(this).find('.form-label');

                fromControl.each(function (i) {
                    var id = 'form-repeater-' + row + '-' + col;
                    $(fromControl[i]).attr('id', id);
                    $(formLabel[i]).attr('for', id);
                    col++;
                });

                row++;
                $(this).slideDown();
                $('.select2-container').remove();
                $('.select2.form-select').select2({
                    placeholder: 'Placeholder text'
                });
                $('.select2-container').css('width', '100%');
                $('.form-repeater:first .form-select').select2({
                    dropdownParent: $(this).parent(),
                    placeholder: 'Placeholder text'
                });
                $('.position-relative .select2').each(function () {
                    $(this).select2({
                        dropdownParent: $(this).closest('.position-relative')
                    });
                });
            }

        });

    }

    // Datatable (jquery)
    $(function () {
        const SUCCESS = 200;
        let borderColor, bodyBg, headingColor;
        // Variable declaration for table
        var dt_product_sp_table = $('.datatables-product-sp');

        // Brands datatable
        if (dt_product_sp_table.length) {
            var dt_product_sp = dt_product_sp_table.DataTable({
                ajax: { url: '{{route('product-specifications.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    { data: 'name', name: 'name' },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" value="' + data +
                                '"data-bs-toggle="modal" data-bs-target="#editSpecificationModal">' +
                                '<i class="ti ti-edit ti-sm me-2"></i></button>' +
                                '<button value="' + full['id'] + '" class="btn btn-sm btn-icon delete-btn"><i class="ti ti-trash ti-sm mx-2"></i></button>' +
                                '</div>'
                            );
                        }
                    }
                ],
                dom:
                    '<"row me-2"' +
                    '<"col-md-2"<"me-3"l>>' +
                    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                language: {
                    lengthMenu: "_MENU_",
                    zeroRecords: "Đang tải dữ liệu",
                    info: "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    infoEmpty: "Không có mục nào để hiển thị",
                    infoFiltered: "(lọc từ _MAX_ mục)",
                    paginate: {
                        first: "Đầu tiên",
                        last: "Cuối cùng",
                        next: "Tiếp theo",
                        previous: "Trước"
                    },
                    emptyTable: "Không có dữ liệu trong bảng",
                    search: '<i class="ti ti-search"></i>',
                    searchPlaceholder: 'Tìm kiếm'
                },
                // Buttons with Dropdown
                buttons: [],
                order: [[1, 'desc']],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                return 'Thông tin chi tiết';
                            }
                        }),
                        type: 'column',
                        renderer: function (api, rowIdx, columns) {
                            var data = $.map(columns, function (col, i) {
                                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                    ? '<tr data-dt-row="' +
                                    col.rowIndex +
                                    '" data-dt-column="' +
                                    col.columnIndex +
                                    '">' +
                                    '<td>' +
                                    col.title +
                                    ':' +
                                    '</td> ' +
                                    '<td>' +
                                    col.data +
                                    '</td>' +
                                    '</tr>'
                                    : '';
                            }).join('');
                            return data ? $('<table class="table"/><tbody />').append(data) : false;
                        }
                    }
                },
            });
        }

        //add new product-sp
        $('#add-btn').click(function (e) {
            e.preventDefault();
            var name = $('#add-product-sp-name').val();
            var sp_values = [];

            $('.add-product-sp-detail').each(function () {
                sp_values.push($(this).val());
            });

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);
            formDataStore.append("sp_values", sp_values)

            $.ajax({
                url: "{{route('product-specifications.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message)
                    reloadDataTable();
                    closeModal('#addSpecificationModal');
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#add-product-sp-form', '.add-product-sp-');
            });
        });

        //show data edit user
        $('.datatables-product-sp').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "product-specifications/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#edit-product-sp-id').val(res.data.id);;
                $('#edit-product-sp-name').val(res.data.name);;
            });
        });

        //update user
        $('#update-btn').click(function (e) {
            e.preventDefault();
            let id = $('#edit-product-sp-id').val();
            let name = $('#edit-product-sp-name').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);

            $.ajax({
                url: 'product-specifications/' + id + '/update',
                method: "post",
                data: formDataUpdate,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message);
                    reloadDataTable();
                    closeModal('#editSpecificationModal');
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#edit-product-sp-form', '.edit-product-sp-')
            });
        });

        //delete employee
        $('.datatables-product-sp').on('click', '.delete-btn', function () {
            var id = $(this).val();
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Dữ liệu này không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đúng, Hãy xóa nó!',
                cancelButtonText: 'Hủy',
                customClass: {
                    confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "product-specifications/" + id,
                        method: "delete",
                        data: {
                            "_token": "{{csrf_token()}}"
                        }
                    }).done(function (res) {
                        if (res.success) {
                            successfulNotification(res.message);
                            reloadDataTable();
                        }
                        if (!res.success) {
                            Swal.fire({ title: res.message, icon: 'error', confirmButtonText: 'OK' });
                            return;
                        }
                    });
                }
            })
        });

        //close modal add-specification
        function closeModal(className) {
            $(className).modal('hide');
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_product_sp.ajax.reload();
        }

        //Notification if request successfully
        function successfulNotification(message) {
            Swal.fire({
                icon: 'success',
                title: 'Đã xóa thành công!',
                text: 'Dữ liệu thông số đã được cập nhật.',
                customClass: {
                    confirmButton: 'btn btn-success waves-effect waves-light'
                }
            });
        }

        //show errors
        function showValidationErrors(errors, formClass, errorClass) {
            $(formClass).addClass('was-validated');
            $.each(errors, function (key, value) {
                $(errorClass + key + '-error').text(value[0]);
            });
        }

        //Clear form create after hiden form
        $('#addSpecificationModal').on('hidden.bs.modal', function () {
            $('#add-product-sp-name').val('');
            $('.add-product-sp-detail').val('');
            $('.add-product-sp-name-error').text('');
        });

        //Clear form edit after hiden form
        $('#editSpecificationModal').on('hidden.bs.modal', function () {
            $('.edit-product-sp-name-error').text('');
            $('.edit-product-sp-name-error').text('');
        });

        // Filter form control to default size
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Suppliers List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-product-sp table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addSpecificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <button type="button" class="btn-close btn-pinned hide-btn" data-bs-dismiss="modal"
                aria-label="Close"></button>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="mb-2">Thêm thông số</h3>
                </div>
                <form id="add-product-sp-form" class="row form-repeater-1" onsubmit="return false">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="add-product-sp-name">Tên thông số</label>
                        <input type="text" id="add-product-sp-name" name="add-product-sp-name" class="form-control"
                            placeholder="Tên thông số" autofocus />
                        <div class="text-danger add-product-sp-name-error"></div>
                    </div>
                    <div class="col-12">
                        <div class="card mb-3">
                            <h6 class="card-header">Giá trị thông số</h6>
                            <div class="card-body">
                                <form class="form-repeater-1">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="mb-3 col-12">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <label class="form-label" for="form-repeater-1-1-1">Giá
                                                                trị</label>
                                                            <input type="text" id="form-repeater-1-1-1"
                                                                name="add-product-sp-detail[]"
                                                                class="form-control add-product-sp-detail"
                                                                placeholder="Giá trị thuộc tính" />
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-label-danger mt-4"
                                                                data-repeater-delete>
                                                                <i class="ti ti-x ti-xs me-1"></i>Xóa
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary" data-repeater-create>Thêm thuộc tính
                                            mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center demo-vertical-spacing">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="add-btn">Lưu</button>
                        <button type="reset" class="btn btn-label-secondary hide-btn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Huỷ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSpecificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <button type="button" class="btn-close btn-pinned hide-btn" data-bs-dismiss="modal"
                aria-label="Close"></button>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="mb-2">Sửa thông số</h3>
                </div>
                <form id="edit-product-sp-form" class="row form-repeater-2" onsubmit="return false">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="edit-product-sp-name">Tên thông số</label>
                        <input type="text" id="edit-product-sp-name" name="edit-product-sp-name" class="form-control"
                            placeholder="Tên thông số" autofocus />
                        <div class="text-danger edit-product-sp-name-error"></div>
                    </div>
                    <div class="col-12">
                        <div class="card mb-3">
                            <h6 class="card-header">Giá trị thông số</h6>
                            <div class="card-body">
                                <form class="form-repeater-2">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="mb-3 col-8">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label class="form-label" for="form-repeater-2-1-1">Giá
                                                                trị</label>
                                                            <input type="text" id="form-repeater-2-1-1"
                                                                name="edit-product-sp-detail[]"
                                                                class="form-control edit-product-sp-detail"
                                                                placeholder="Giá trị thuộc tính" />
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-label-danger mt-4"
                                                                data-repeater-delete>
                                                                <i class="ti ti-x ti-xs me-1"></i>Xóa
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary" data-repeater-create>Thêm thuộc tính
                                            mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center demo-vertical-spacing">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="update-btn">Lưu</button>
                        <button type="reset" class="btn btn-label-secondary hide-btn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Huỷ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
