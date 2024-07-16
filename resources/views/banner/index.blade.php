@extends('layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
<script>
    'use strict';
    const userAddBirthday = document.querySelector('#add-user-birthday');
    const userEditBirthday = document.querySelector('#edit-user-birthday');
    const select2ForAddRole = $('.add-user-role-select2');
    const select2ForEditRole = $('.edit-user-role-select2');
    const formDataStore = new FormData();
    const formDataUpdate = new FormData();


    if (userAddBirthday || userEditBirthday) {
        userAddBirthday.flatpickr({
            dateFormat: 'd-m-Y'
        });
        userEditBirthday.flatpickr({
            dateFormat: 'd-m-Y'
        });
    }

    if (select2ForAddRole.length || select2ForEditRole.length) {
        select2ForAddRole.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn vai trò',
                dropdownParent: $this.parent()
            });
        });

        select2ForEditRole.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn vai trò',
                dropdownParent: $this.parent(),
            });
        });
    }

    // Datatable (jquery)
    $(function () {
        const SUCCESS = 200;
        let borderColor, bodyBg, headingColor;
        // Variable declaration for table
        var dt_banner_table = $('.datatables-banners');

        // Users datatable
        if (dt_banner_table.length) {
            var dt_banner = dt_banner_table.DataTable({
                ajax: { url: '{{route('banners.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'name', name: 'name'
                    },
                    {
                        data: 'image_url', render: function (data, type, full, meta) {
                            return ('<img src="/' + data + '" alt="" width="150"/>');
                        }
                    },
                    { data: 'link', name: 'link' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'status',
                        render: function (data, type, full, meta) {
                            let statusObj = {
                                1: { title: 'Đang hoạt động', class: 'bg-label-success' },
                                0: { title: 'Không hoạt động', class: 'bg-label-secondary' }
                            };

                            return ('<span class="badge ' +
                                statusObj[data].class +
                                '" text-capitalized>' +
                                statusObj[data].title +
                                '</span>');
                        }
                    },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" value="' + data +
                                '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditBanner">' +
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
                buttons: [
                    {
                        text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Tạo banner</span>',
                        className: 'add-new btn btn-primary waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'offcanvas',
                            'data-bs-target': '#offcanvasAddBanner'
                        }
                    }
                ],
                // For responsive popup
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

        //add new banner
        $('#add-btn').click(function (e) {
            e.preventDefault();

            let name = $('#add-banner-name').val();
            let link = $('#add-banner-link').val();
            let status = $('#add-banner-status').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);
            formDataStore.append("link", link);
            formDataStore.append("status", status);

            $.ajax({
                url: "{{route('banners.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.status) {
                    successfulNotification(res.message)
                    reloadDataTable();
                    closeOffCanvas();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#add-new-banner-form', '.add-banner-');
            });
        });

        //show data edit user
        $('.datatables-banners').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "banners/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#edit-banner-id').val(res.data.id);
                $('#edit-banner-name').val(res.data.name);
                $('#edit-banner-link').val(res.data.link);
                $('#edit-banner-image_url').val(res.data.image_url);
                $('#edit-user-status').val(res.data.status);
            });
        });

        //update user
        $('#update-btn').click(function (e) {
            e.preventDefault();
            let id = $('#edit-banner-id').val();
            let name = $('#edit-banner-name').val();
            let link = $('#edit-banner-link').val();
            let status = $('#edit-banner-status').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);
            formDataUpdate.append("link", link);
            formDataUpdate.append("status", status);

            $.ajax({
                url: 'banners/' + id + '/update',
                method: "post",
                data: formDataUpdate,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.status) {
                    successfulNotification(res.message);
                    dt_banner.ajax.reload();
                    closeOffCanvas();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#edit-banner-form', '.edit-banner-')
            });
        });

        //delete banner
        $('.datatables-banners').on('click', '.delete-btn', function () {
            var id = $(this).val();
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "Bạn có muốn xóa mục này.",
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light',
                    cancelButton: 'btn btn-secondary waves-effect waves-light'
                },
                buttonsStyling: false,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "banners/" + id,
                        method: "delete",
                        data: {
                            "_token": "{{csrf_token()}}"
                        }
                    }).done(function (res) {
                        if (res.status) {
                            successfulNotification(res.message);
                            dt_banner.ajax.reload();
                        }
                        if (!res.status) {
                            Swal.fire({ title: "Có lỗi xảy ra, vui lòng thử lại sau.", icon: 'error', confirmButtonText: 'OK' });
                            return;
                        }
                    });
                }
            })
        });

        //close offcanvas add-user
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_banner.ajax.reload();
        }

        //Notification if request successfully
        function successfulNotification(message) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                },
                buttonsStyling: false
            });
        }

        //show errors
        function showValidationErrors(errors, formClass, errorClass) {
            $(formClass).addClass('was-validated');
            $.each(errors, function (key, value) {
                $(errorClass + key + '-error').text(value[0]);
                $(errorClass + key + '-error').text(value[1]);
                $(errorClass + key + '-error').text(value[2]);
                $(errorClass + key + '-error').text(value[3]);
                $(errorClass + key + '-error').text(value[4]);
                $(errorClass + key + '-error').text(value[5]);
                $(errorClass + key + '-error').text(value[6]);
            });
        }

        //For get url add-image
        $('#add-banner-image_url').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataStore.set("image_url", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //For get url edit-image
        $('#edit-banner-image_url').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataUpdate.set("image_url", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //Clear inputFile after store or update
        function clearInputFile(f) {
            if (f.value) {
                try {
                    f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
                } catch (err) { }
                if (f.value) { //for IE5 ~ IE10
                    var form = document.createElement('form'),
                        parentNode = f.parentNode, ref = f.nextSibling;
                    form.appendChild(f);
                    form.reset();
                    parentNode.insertBefore(f, ref);
                }
            }
        }

        //Clear form create after hiden form
        $('#offcanvasAddBanner').on('hidden.bs.offcanvas', function () {
            $('#add-banner-name').val('');
            $('#add-banner-link').val('');
            $('#add-banner-image_url').click(function () { clearInputFile($(this).val()); });
            $("#add-banner-status").val($("#add-banner-status option:first").val());
            $("#add-banner-status").trigger('change');
            $('.add-banner-name-error').text('');
            $('.add-banner-link-error').text('');
            $('.add-banner-image_url-error').text('');
            $(".add-banner-status-error").text('');
        });

        //Clear form edit after hiden form
        $('#offcanvasEditBanner').on('hidden.bs.offcanvas', function () {
            $('#edit-banner-image_url').click(function () { clearInputFile($(this).val()); });
            $('.edit-banner-name-error').text('');
            $('.edit-banner-link-error').text('');
            $('.edit-banner-image_url-error').text('');
            $(".edit-banner-status-error").text('');
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
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">Trang chủ /</span><span class="fw-medium"> Danh sách banner</span>
    </h4>

    <!-- Users List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-banners table">
                <thead class="border-top">
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Đường dẫn</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddBanner"
            aria-labelledby="offcanvasAddBannerLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddBannerLabel" class="offcanvas-title">Tạo banner</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-banner-form pt-0" id="editUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-banner-name">Tiêu đề<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" id="add-banner-name" placeholder="Nhập tiêu đề"
                            name="add-banner-name" aria-label="Nhập tiêu đề" />
                        <div class="text-danger add-banner-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-banner-link">Đường dẫn<span style="color: red">
                                *</span></label>
                        <input type="text" id="add-banner-link" class="form-control" placeholder="Nhập đường dẫn"
                            aria-label="Nhập đường dẫn" name="add-banner-link" />
                        <div class="text-danger add-banner-link-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-banner-image_url">Ảnh </label>
                        <input class="form-control" type="file" id="add-banner-image_url"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger add-banner-image_url-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user-status">Trạng thái<span style="color: red"> *</span></label>
                        <select id="add-banner-status" class="form-select">
                            <option selected value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                        <div class="text-danger add-banner-status-error"></div>
                    </div>
                    <button type="submit" id="add-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary close-offcanvas"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
        <!-- Offcanvas to edit banner -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditBanner"
            aria-labelledby="offcanvasAddBannerLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddBannerLabel" class="offcanvas-title">Tạo banner</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="edit-new-banner-form pt-0" id="editUserForm" onsubmit="return false">
                    <input type="number" class="form-control" id="edit-banner-id" placeholder="Nhập tiêu đề" hidden />
                    <div class="mb-3">
                        <label class="form-label" for="edit-banner-name">Tiêu đề<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" id="edit-banner-name" placeholder="Nhập tiêu đề"
                            name="edit-banner-name" aria-label="Nhập tiêu đề" />
                        <div class="text-danger edit-banner-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-banner-link">Đường dẫn<span style="color: red">
                                *</span></label>
                        <input type="text" id="edit-banner-link" class="form-control" placeholder="Nhập đường dẫn"
                            aria-label="Nhập đường dẫn" name="edit-banner-link" />
                        <div class="text-danger edit-banner-link-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-banner-image_url">Ảnh </label>
                        <input class="form-control" type="file" id="edit-banner-image_url"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger edit-banner-image_url-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-banner-status">Trạng thái<span style="color: red">
                                *</span></label>
                        <select id="edit-banner-status" class="form-select">
                            <option selected value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                        <div class="text-danger edit-banner-status-error"></div>
                    </div>
                    <button type="submit" id="update-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary close-offcanvas"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
