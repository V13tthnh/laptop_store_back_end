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
        var dt_supplier_table = $('.datatables-suppliers');

        // Users datatable
        if (dt_supplier_table.length) {
            var dt_supplier = dt_supplier_table.DataTable({
                ajax: { url: '{{route('suppliers.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'name', render: function (data, type, full, meta) {
                            var $name = full['name'],
                                $email = full['email'],
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
                                '<small class="text-muted">' +
                                $email +
                                '</small>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'address', name: 'address' },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" value="' + data +
                                '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser">' +
                                '<i class="ti ti-edit ti-sm me-2"></i></button>' +
                                '<button value="' + full['id'] + '" class="btn btn-sm btn-icon delete-btn"><i class="ti ti-trash ti-sm mx-2"></i></button>' +
                                '</div>' +
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
                                    columns: [1, 2, 3, 4, 5],
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
                                    columns: [1, 2, 3, 4, 5],
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
                                    columns: [1, 2, 3, 4, 5],
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
                                    columns: [1, 2, 3, 4, 5],
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
                                    columns: [1, 2, 3, 4, 5],
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
                        text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Thêm nhà cung cấp</span>',
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

        //go to trash page
        $('.trashPage').click(function (e) {
            e.preventDefault();
            window.location.href = '/admin/employees/trash';
        });

        //add new user
        $('#add-btn').click(function (e) {
            e.preventDefault();

            let name = $('#add-supplier-name').val();
            let email = $('#add-supplier-email').val();
            let phone = $('#add-supplier-phone').val();
            let address = $('#add-supplier-address').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);
            formDataStore.append("phone", phone);
            formDataStore.append("email", email);
            formDataStore.append("address", address);

            $.ajax({
                url: "{{route('suppliers.store')}}",
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
                showValidationErrors(errors, '#add-new-supplier-form', '.add-supplier-');
            });
        });

        //show data edit user
        $('.datatables-suppliers').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "suppliers/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#edit-supplier-id').val(res.data.id);
                $('#edit-supplier-name').val(res.data.name);
                $('#edit-supplier-email').val(res.data.email);
                $('#edit-supplier-phone').val(res.data.phone);
                $('#edit-supplier-address').val(res.data.address);
            });
        });

        //update user
        $('#update-btn').click(function (e) {
            e.preventDefault();
            let id = $('#edit-supplier-id').val();
            let name = $('#edit-supplier-name').val();
            let email = $('#edit-supplier-email').val();
            let phone = $('#edit-supplier-phone').val();
            let address = $('#edit-supplier-address').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);
            formDataUpdate.append("phone", phone);
            formDataUpdate.append("email", email);
            formDataUpdate.append("address", address);
            $.ajax({
                url: 'suppliers/' + id + '/update',
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
                showValidationErrors(errors, '#edit-supplier-form', '.edit-supplier-')
            });
        });

        //delete employee
        $('.datatables-suppliers').on('click', '.delete-btn', function () {
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
                        url: "suppliers/" + id,
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

        //close offcanvas add-supplier
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_supplier.ajax.reload();
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
            });
        }

        //For get url add-image
        $('#add-supplier-logo').change(function (e) {
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
        $('#edit-supplier-logo').change(function (e) {
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
            $('#add-supplier-name').val('');
            $('#add-supplier-email').val('');
            $('#add-supplier-password').val('');
            $('#add-supplier-logo').click(function () { clearInputFile($(this).val()); });
            $('#add-supplier-phone').text('');
            $('#add-supplier-address').val('');

            $('.add-supplier-name-error').text('');
            $('.add-supplier-email-error').text('');
            $('.add-supplier-password-error').text('');
            $('.add-supplier-logo-error').text('');
            $('.add-supplier-phone-error').text('');
            $('.add-supplier-address-error').text('');
        });

        //Clear form edit after hiden form
        $('#offcanvasEditUser').on('hidden.bs.offcanvas', function () {
            $('#edit-supplier-logo').click(function () { clearInputFile($(this).val()); });
            $('.edit-supplier-name-error').text('');
            $('.edit-supplier-email-error').text('');
            $('.edit-supplier-phone-error').text('');
            $('.edit-supplier-address-error').text('');

            $('.edit-supplier-name-error').text('');
            $('.edit-supplier-email-error').text('');
            $('.edit-supplier-password-error').text('');
            $('.edit-supplier-logo-error').text('');
            $('.edit-supplier-phone-error').text('');
            $('.edit-supplier-address-error').text('');
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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách nhà cung cấp</h4>
    <!-- Suppliers List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-suppliers table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new supplier -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Thêm nhà cung cấp</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-supplier-form pt-0" id="editUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-supplier-name">Tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="add-supplier-name" placeholder="Tên nhà cung cấp"
                            name="add-supplier-name" />
                        <div class="text-danger add-supplier-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-supplier-email">Email<span style="color: red">
                                *</span></label>
                        <input type="text" id="add-supplier-email" class="form-control"
                            placeholder="nguyenvana@example.com" aria-label="nguyenvana@example.com"
                            name="add-supplier-email" />
                        <div class="text-danger add-supplier-email-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-supplier-phone">SĐT<span style="color: red"> *</span></label>
                        <input type="text" id="add-supplier-phone" class="form-control phone-mask"
                            placeholder="(+84) 123456 789" aria-label="john.doe@example.com"
                            name="add-supplier-phone" />
                        <div class="text-danger add-supplier-phone-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-supplier-address">Địa chỉ<span style="color: red">
                                *</span></label>
                        <input type="text" id="add-supplier-address" class="form-control phone-mask"
                            placeholder="Địa chỉ" name="add-supplier-address" />
                        <div class="text-danger add-supplier-address-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-supplier-logo">Logo</label>
                        <input class="form-control" type="file" id="add-supplier-logo"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger add-supplier-logo-error"></div>
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
                <h5 id="offcanvasEditUser" class="offcanvas-title">Sửa nhà cung cấp</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="edit-supplier-form pt-0" id="edit-supplier-form" onsubmit="return false">
                    <input type="number" id="edit-supplier-id" hidden>
                    <div class="mb-3">
                        <label class="form-label" for="edit-name">Họ tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="edit-supplier-name" placeholder="Tên nhà cung cấp"
                            name="edit-supplier-name" />
                        <div class="text-danger edit-supplier-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-supplier-email">Email<span style="color: red">
                                *</span></label>
                        <input type="text" id="edit-supplier-email" class="form-control"
                            placeholder="nguyenvana@example.com" aria-label="nguyenvana@example.com"
                            name="edit-supplier-email" />
                        <div class="text-danger edit-supplier-email-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-supplier-phone">SĐT<span style="color: red">
                                *</span></label>
                        <input type="text" id="edit-supplier-phone" class="form-control phone-mask"
                            placeholder="(+84) 123456 789" aria-label="john.doe@example.com"
                            name="edit-supplier-phone" />
                        <div class="text-danger edit-supplier-phone-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-supplier-address">Địa chỉ<span style="color: red">
                                *</span></label>
                        <input type="text" id="edit-supplier-address" class="form-control phone-mask"
                            placeholder="Địa chỉ" name="edit-supplier-address" />
                        <div class="text-danger edit-supplier-address-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-supplier-logo">Logo</label>
                        <input class="form-control" type="file" id="edit-supplier-logo"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger edit-supplier-logo-error"></div>
                    </div>
                    <button type="submit" id="update-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
