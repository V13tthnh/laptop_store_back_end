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
    const formDataStore = new FormData();
    const formDataUpdate = new FormData();

    // Datatable (jquery)
    $(function () {
        const SUCCESS = 200;
        let borderColor, bodyBg, headingColor;
        // Variable declaration for table
        var dt_brand_table = $('.datatables-brands');

        // Brands datatable
        if (dt_brand_table.length) {
            var dt_brand = dt_brand_table.DataTable({
                ajax: { url: '{{route('brands.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'name', render: function (data, type, full, meta) {
                            var $name = full['name'],
                                $image = full['logo'];
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="/' + $image + '" alt="Avatar" class="rounded-circle">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6);
                                var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $name = full['name'],
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                            }
                            // Creates full output for row
                            var $row_output =
                                '<div class="d-flex justify-content-start align-items-center user-name">' +
                                '<div class="avatar-wrapper">' +
                                '<div class="avatar me-3">' +
                                $output +
                                '</div>' +
                                '</div>' +
                                '<div class="d-flex flex-column">' +
                                '<a href="" class="text-body text-truncate"><span class="fw-medium">' +
                                $name +
                                '</span></a>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" value="' + data +
                                '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser">' +
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
                        extend: 'collection',
                        className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
                        text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Xuất',
                        buttons: [
                            {
                                extend: 'print',
                                text: '<i class="ti ti-printer me-2" ></i>Print',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3],
                                    // prevent avatar to be print
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        }
                                    }
                                },
                                customize: function (win) {
                                    //customize print view for dark
                                    $(win.document.body)
                                        .css('color', headingColor)
                                        .css('border-color', borderColor)
                                        .css('background-color', bodyBg);
                                    $(win.document.body)
                                        .find('table')
                                        .addClass('compact')
                                        .css('color', 'inherit')
                                        .css('border-color', 'inherit')
                                        .css('background-color', 'inherit');
                                }
                            },
                            {
                                extend: 'csv',
                                text: '<i class="ti ti-file-text me-2" ></i>Csv',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        }
                                    }
                                }
                            },
                            {
                                extend: 'excel',
                                text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        }
                                    }
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        }
                                    }
                                }
                            },
                            {
                                extend: 'copy',
                                text: '<i class="ti ti-copy me-2" ></i>Copy',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                    result = result + item.lastChild.firstChild.textContent;
                                                } else if (item.innerText === undefined) {
                                                    result = result + item.textContent;
                                                } else result = result + item.innerText;
                                            });
                                            return result;
                                        }
                                    }
                                }
                            }
                        ]
                    },
                    {
                        text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Thêm thương hiệu</span>',
                        className: 'add-new btn btn-primary waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'offcanvas',
                            'data-bs-target': '#offcanvasAddUser'
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

        //add new user
        $('#add-btn').click(function (e) {
            e.preventDefault();

            let name = $('#add-brand-name').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);

            $.ajax({
                url: "{{route('brands.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message)
                    reloadDataTable();
                    closeOffCanvas();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#add-new-brand-form', '.add-brand-');
            });
        });

        //show data edit user
        $('.datatables-brands').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "brands/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#edit-brand-id').val(res.data.id);
                $('#edit-brand-name').val(res.data.name);
            });
        });

        //update user
        $('#update-btn').click(function (e) {
            e.preventDefault();
            let id = $('#edit-brand-id').val();
            let name = $('#edit-brand-name').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);

            $.ajax({
                url: 'brands/' + id + '/update',
                method: "post",
                data: formDataUpdate,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message);
                    reloadDataTable();
                    closeOffCanvas();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#edit-brand-form', '.edit-brand-')
            });
        });

        //delete employee
        $('.datatables-brands').on('click', '.delete-btn', function () {
            var id = $(this).val();
            Swal.fire({
                title: 'Bạn muốn xóa mục này',
                text: 'Dữ liệu bị xóa vẫn có thể khôi phục!',
                icon: 'warning',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "brands/" + id,
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

        //close offcanvas add-brand
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_brand.ajax.reload();
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
            });
        }

        //For get url add-image
        $('#add-brand-logo').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataStore.set("logo", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //For get url edit-image
        $('#edit-brand-logo').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataUpdate.set("logo", input.files[0]);
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
        $('#offcanvasAddUser').on('hidden.bs.offcanvas', function () {
            $('#add-brand-name').val('');
            $('#add-brand-logo').click(function () { clearInputFile($(this).val()); });

            $('.add-brand-name-error').text('');
            $('.add-brand-logo-error').text('');
        });

        //Clear form edit after hiden form
        $('#offcanvasEditUser').on('hidden.bs.offcanvas', function () {
            $('#edit-brand-logo').click(function () { clearInputFile($(this).val()); });
            $('.edit-brand-name-error').text('');

            $('.edit-brand-name-error').text('');
            $('.edit-brand-logo-error').text('');
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
            <table class="datatables-brands table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new supplier -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Thêm thương hiệu</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-brand-form pt-0" id="editUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-brand-name">Tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="add-brand-name" placeholder="Tên thương hiệu"
                            name="add-brand-name" />
                        <div class="text-danger add-brand-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-brand-logo">Logo</label>
                        <input class="form-control" type="file" id="add-brand-logo"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger add-brand-logo-error"></div>
                    </div>
                    <button type="submit" id="add-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary close-offcanvas"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
        <!-- Offcanvas to edit supplier -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasEditUser" class="offcanvas-title">Sửa thương hiệu</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="edit-brand-form pt-0" id="edit-brand-form" onsubmit="return false">
                    <input type="number" id="edit-brand-id" hidden>
                    <div class="mb-3">
                        <label class="form-label" for="edit-name">Tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="edit-brand-name" placeholder="Tên thương hiệu"
                            name="edit-brand-name" />
                        <div class="text-danger edit-brand-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-brand-logo">Logo</label>
                        <input class="form-control" type="file" id="edit-brand-logo"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger edit-brand-logo-error"></div>
                    </div>
                    <button type="submit" id="update-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
