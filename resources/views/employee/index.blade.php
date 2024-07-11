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
    const selectPicker = $('.selectpicker');

    if (selectPicker.length) {
        selectPicker.selectpicker();
    }


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
        var dt_user_table = $('.datatables-users');

        // Users datatable
        if (dt_user_table.length) {
            var dt_user = dt_user_table.DataTable({
                ajax: { url: '{{route('employees.data-table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'full_name',
                        render: function (data, type, full, meta) {
                            var $name = full['full_name'],
                                $email = full['email'],
                                $image = full['avatar'];
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="/' + $image + '" alt="Avatar" class="rounded-circle">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6);
                                var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $name = full['full_name'],
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
                                '<a href="/admin/employees/' + full['id'] + '" class="text-body text-truncate"><span class="fw-medium">' +
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
                    {
                        data: 'roles',
                        render: function (data, type, full, meta) {
                            var $role = full['roles'];
                            return "<span class='text-truncate d-flex align-items-center'>" + $role + '</span>';
                        }
                    },
                    {
                        data: 'birthday',
                        render: function (data, type, full, meta) {
                            var $birthday = full['birthday'];
                            return '<span class="fw-medium">' + $birthday + '</span>';
                        }
                    },
                    {
                        data: 'gender',
                        render: function (data, type, full, meta) {
                            var $gender = full['gender'];
                            return '<span class="fw-medium">' + $gender + '</span>';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, full, meta) {
                            var $status = full[1];
                            let statusObj = {
                                1: { title: 'Đang hoạt động', class: 'bg-label-success' },
                                0: { title: 'Không hoạt động', class: 'bg-label-secondary' }
                            };

                            return ('<span class="badge ' +
                                statusObj[1].class +
                                '" text-capitalized>' +
                                statusObj[1].title +
                                '</span>');
                        }
                    },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" value="' + data +
                                '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser">' +
                                '<i class="ti ti-edit ti-sm me-2"></i></button>' +
                                '<button value="' + full['id'] + '" class="btn btn-sm btn-icon delete-btn"><i class="ti ti-trash ti-sm mx-2"></i></button>' +
                                '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                                '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                // '<a href="" class="dropdown-item">Xem chi tiết</a>' +
                                '<button class="dropdown-item" data-bs-target="#addRoleModal" data-bs-toggle="modal">Phân quyền</button>' +
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
                        text: '<i class="ti ti-trash ti-xs me-0 me-sm-2"></i><span class="v-btn__content" data-no-activator="">Danh sách đã xóa</span>',
                        className: 'add-new btn btn-danger ms-2 waves-effect waves-light trashPage',
                    },
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
                                    columns: [0, 1, 2, 3, 4],
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
                                    columns: [0, 1, 2, 3, 4],
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
                                    columns: [0, 1, 2, 3, 4],
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
                                    columns: [0, 1, 2, 3, 4],
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
                                    columns: [0, 1, 2, 3, 4],
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
                        text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Thêm nhân viên</span>',
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

            let full_name = $('#add-user-name').val();
            let email = $('#add-user-email').val();
            let phone = $('#add-user-phone').val();
            let birthday = $('#add-user-birthday').val();
            let gender = $('#add-user-gender option:selected').text();
            let password = $('#add-user-password').val();
            let role = $('#add-user-role option:selected').text();
            let status = $('#add-user-status').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("full_name", full_name);
            formDataStore.append("phone", phone);
            formDataStore.append("email", email);
            formDataStore.append("password", password);
            formDataStore.append("birthday", birthday);
            formDataStore.append("gender", gender);
            formDataStore.append("role", role);
            formDataStore.append("status", status);

            $.ajax({
                url: "{{route('employees.store')}}",
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
                showValidationErrors(errors, '#add-new-user-form', '.add-user-');
            });
        });

        //show data edit user
        $('.datatables-users').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "employees/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#edit-user-id').val(res.data.id);
                $('#edit-user-name').val(res.data.full_name);
                $('#edit-user-email').val(res.data.email);
                $('#edit-user-phone').val(res.data.phone);
                $('#edit-user-birthday').val(res.data.birthday);
                $('#edit-user-gender').val(res.data.gender == 'nam' || 'Nam' ? 1 : res.data.gender == 'nữ' | 'Nữ' ? 2 : 3);
                $('#edit-user-password').val(res.data.password);
                $('#edit-user-role').val(res.data.roles[0].id);
                $('#edit-user-status').val(res.data.status);
            });
        });

        //update user
        $('#update-btn').click(function (e) {
            e.preventDefault();
            let id = $('#edit-user-id').val();
            let full_name = $('#edit-user-name').val();
            let email = $('#edit-user-email').val();
            let phone = $('#edit-user-phone').val();
            let birthday = $('#edit-user-birthday').val();
            let gender = $('#edit-user-gender option:selected').text();
            let role = $('#edit-user-role option:selected').text();
            let status = $('#edit-user-status').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("full_name", full_name);
            formDataUpdate.append("phone", phone);
            formDataUpdate.append("email", email);
            formDataUpdate.append("birthday", birthday);
            formDataUpdate.append("gender", gender);
            formDataUpdate.append("role", role);
            formDataUpdate.append("status", status);

            $.ajax({
                url: 'employees/' + id + '/update',
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
                showValidationErrors(errors, '#edit-user-form', '.edit-user-')
            });
        });

        //delete employee
        $('.datatables-users').on('click', '.delete-btn', function () {
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
                        url: "employees/" + id,
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

        //close offcanvas add-user
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_user.ajax.reload();
        }

        //Notification if request successfully
        function successfulNotification(message) {
            Swal.fire({
                icon: 'success',
                title: 'Đã xóa thành công!',
                text: 'Bảng nhân viên đã được cập nhật.',
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
                $(errorClass + key + '-error').text(value[1]);
                $(errorClass + key + '-error').text(value[2]);
                $(errorClass + key + '-error').text(value[3]);
                $(errorClass + key + '-error').text(value[4]);
                $(errorClass + key + '-error').text(value[5]);
                $(errorClass + key + '-error').text(value[6]);
            });
        }

        //For get url add-image
        $('#add-user-avatar').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataStore.set("avatar", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //For get url edit-image
        $('#edit-user-avatar').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataUpdate.set("avatar", input.files[0]);
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
            $('#add-user-name').val('');
            $('#add-user-email').val('');
            $('#add-user-password').val('');
            $('#add-user-avatar').click(function () { clearInputFile($(this).val()); });
            $('#add-user-phone').text('');
            $('#add-user-birthday').val('');
            $('#add-user-gender').val($("#add-user-gender option:first").val());
            $("#add-user-role").val($("#add-user-role option:first").val());
            $("#add-user-role").trigger('change');
            $("#add-user-status").val($("#add-user-status option:first").val());
            $("#add-user-status").trigger('change');
            $('.add-user-name-error').text('');
            $('.add-user-email-error').text('');
            $('.add-user-password-error').text('');
            $('.add-user-avatar-error').text('');
            $('.add-user-phone-error').text('');
            $('.add-user-birthday-error').text('');
            $('.add-user-gender-error').text('');
            $(".add-user-role-error").text('');
            $(".add-user-status-error").text('');
        });

        //Clear form edit after hiden form
        $('#offcanvasEditUser').on('hidden.bs.offcanvas', function () {
            $('#edit-user-avatar').click(function () { clearInputFile($(this).val()); });
            $('.edit-user-name-error').text('');
            $('.edit-user-email-error').text('');
            $('.edit-user-avatar-error').text('');
            $('.edit-user-phone-error').text('');
            $('.edit-user-birthday-error').text('');
            $('.edit-user-gender-error').text('');
            $(".edit-user-role-error").text('');
            $(".edit-user-status-error").text('');
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
        <span class="text-muted fw-light">Trang chủ /</span><span class="fw-medium"> Danh sách nhân viên</span>
    </h4>

    <!-- Users List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-users table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Thêm nhân viên</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-user-form pt-0" id="editUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-name">Họ tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="add-user-name" placeholder="Nguyễn Văn A"
                            name="add-user-name" aria-label="Nguyễn Văn A" />
                        <div class="text-danger add-user-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email<span style="color: red"> *</span></label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="nguyenvana@example.com"
                            aria-label="nguyenvana@example.com" name="add-user-email" />
                        <div class="text-danger add-user-email-error"></div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Mật khẩu<span style="color: red"> *</span></label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="add-user-password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        <div class="text-danger add-user-password-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add-user-birthday" class="form-label">Ngày sinh<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYYY" id="add-user-birthday" />
                        <div class="text-danger add-user-birthday-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-phone">SĐT<span style="color: red"> *</span></label>
                        <input type="text" id="add-user-phone" class="form-control phone-mask"
                            placeholder="(+84) 123456 789" aria-label="john.doe@example.com" name="add-user-phone" />
                        <div class="text-danger add-user-phone-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="add-user-gender" class="form-label">Giới tính</label>
                        <select id="add-user-gender" class="selectpicker w-100" data-style="btn-default">
                            <option selected value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Khác</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-avatar">Ảnh đại diện</label>
                        <input class="form-control" type="file" id="add-user-avatar"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger add-user-avatar-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="add-user-role" class="form-label">Vai trò</label>
                        <select id="add-user-role" class="selectpicker w-100" data-style="btn-default">
                            <option disabled selected value="0">Chọn vai trò</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="add-user-status">Trạng thái</label>
                        <select id="add-user-status" class="selectpicker w-100" data-style="btn-default">
                            <option selected value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                        <div class="text-danger add-user-status-error"></div>
                    </div>
                    <button type="submit" id="add-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary close-offcanvas"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>
        <!-- Offcanvas to edit user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasEditUser" class="offcanvas-title">Sửa nhân viên</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="edit-user-form pt-0" id="edit-user-form" onsubmit="return false">
                    <input type="number" id="edit-user-id" hidden>
                    <div class="mb-3">
                        <label class="form-label" for="edit-name">Họ tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="edit-user-name" placeholder="Nguyễn Văn A"
                            name="edit-user-name" aria-label="John Doe" />
                        <div class="text-danger edit-user-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-email">Email<span style="color: red"> *</span></label>
                        <input type="text" id="edit-user-email" class="form-control"
                            placeholder="nguyenvana@example.com" aria-label="nguyenvana@example.com"
                            name="edit-user-email" />
                        <div class="text-danger edit-user-email-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user-birthday" class="form-label">Ngày sinh<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYY" id="edit-user-birthday" />
                        <div class="text-danger edit-user-birthday-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-phone">SĐT<span style="color: red"> *</span></label>
                        <input type="text" id="edit-user-phone" class="form-control phone-mask"
                            placeholder="(+84) 123456 789" aria-label="john.doe@example.com" name="edit-user-phone" />
                        <div class="text-danger edit-user-phone-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-gender">Giới tính<span style="color: red">
                                *</span></label>
                        <select id="edit-user-gender" class="selectpicker w-100" data-style="btn-default">
                            <option selected value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Khác</option>
                        </select>
                        <div class="text-danger edit-user-status-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-avatar">Ảnh đại diện</label>
                        <input class="form-control" type="file" id="edit-user-avatar"
                            accept="image/png, image/gif, image/jpeg" />
                        <div class="text-danger edit-user-avatar-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-role">Vai trò</label>
                        <select id="edit-user-role" class="selectpicker w-100" data-style="btn-default">
                            <option disabled selected value="0">Chọn vai trò</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger edit-user-role-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit-user-status">Trạng thái<span style="color: red">
                                *</span></label>
                        <select id="edit-user-status" class="selectpicker w-100" data-style="btn-default">
                            <option selected value="1">Hoạt động</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                        <div class="text-danger edit-user-status-error"></div>
                    </div>
                    <button type="submit" id="update-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>


        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h3 class="role-title mb-2">Thêm vai trò mới</h3>
                            <p class="text-muted">Cài đặt quyền cho vai trò</p>
                        </div>
                        <!-- Add role form -->
                        <form id="addRoleForm" class="row g-3" onsubmit="return false">
                            <div class="col-12">
                                <h5>Chọn quyền</h5>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="text-nowrap fw-medium">{{$role->name}}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @foreach ($role->permissions as $permission)
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="contentManagementRead" />
                                                                    <label class="form-check-label" for="contentManagementRead">
                                                                        {{$permission->name}} </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="add-btn">Lưu</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Huỷ
                                </button>
                            </div>
                        </form>
                        <!--/ Add role form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
