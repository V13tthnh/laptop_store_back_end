@extends('layout')


@section('css')

@endsection

@section('js')
<script>
    'use strict';

    // Datatable (jquery)
    $(function () {
        var dt_role = $('.datatables-roles'),
            statusObj = {
                // 0: { title: 'Chưa giải quyết', class: 'bg-label-warning' },
                1: { title: 'Đang hoạt động', class: 'bg-label-success' },
                2: { title: 'Không hoạt động', class: 'bg-label-secondary' }
            };
        var formDataStore = new FormData();
        var formDataUpdate = new FormData();
        var dtRole;
        // Users List datatable
        if (dt_role.length) {
            dtRole = dt_role.DataTable({
                ajax: { url: '{{route('roles.data-table')}}', method: 'get', dataType: 'json' },
                columns: [
                    // columns according to JSON
                    { data: '' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'id', name: 'id' }
                ],
                columnDefs: [
                    {
                        // For Responsive
                        className: 'control',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function (data, type, full, meta) {
                            return '';
                        }
                    },
                    // {
                    //     // User full name and email
                    //     targets: 1,
                    //     responsivePriority: 4,
                    //     render: function (data, type, full, meta) {
                    //         var $name = full['name'],
                    //             $email = full['name'],
                    //             $image = full['image'];
                    //         if ($image) {
                    //             // For Avatar image
                    //             var $output =
                    //                 '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
                    //         } else {
                    //             // For Avatar badge
                    //             var stateNum = Math.floor(Math.random() * 6);
                    //             var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                    //             var $state = states[stateNum],
                    //                 $name = full['name'],
                    //                 $initials = $name.match(/\b\w/g) || [];
                    //             $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                    //             $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                    //         }
                    //         // Creates full output for row
                    //         var $row_output =
                    //             '<div class="d-flex justify-content-left align-items-center">' +
                    //             '<div class="avatar-wrapper">' +
                    //             '<div class="avatar me-3">' +
                    //             $output +
                    //             '</div>' +
                    //             '</div>' +
                    //             '<div class="d-flex flex-column">' +
                    //             '<a href="" class="text-body text-truncate"><span class="fw-medium">' +
                    //             $name +
                    //             '</span></a>' +
                    //             '<small class="text-muted">@' +
                    //             $email +
                    //             '</small>' +
                    //             '</div>' +
                    //             '</div>';
                    //         return $row_output;
                    //     }
                    // },
                    {
                        // User Role
                        render: function (data, type, full, meta) {
                            var $role = full['name'];
                            // var roleBadgeObj = {
                            //    Subscriber:
                            //         '<span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>',
                            //     Author:
                            //         '<span class="badge badge-center rounded-pill bg-label-success me-3 w-px-30 h-px-30"><i class="ti ti-settings ti-sm"></i></span>',
                            //     Maintainer:
                            //         '<span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>',
                            //     Editor:
                            //         '<span class="badge badge-center rounded-pill bg-label-info me-3 w-px-30 h-px-30"><i class="ti ti-edit ti-sm"></i></span>',
                            //     Admin:
                            //         '<span class="badge badge-center rounded-pill bg-label-secondary me-3 w-px-30 h-px-30"><i class="ti ti-device-laptop ti-sm"></i></span>'
                            // };
                            return "<span class='text-truncate d-flex align-items-center'>" +
                                '<span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30">' +
                                '<i class="ti ti-user ti-sm"></i></span>' + $role + '</span>';
                        }
                    },
                    {
                        // User Status
                        render: function (data, type, full, meta) {
                            var $status = full['name'];
                            return (
                                '<span class="badge ' +
                                statusObj[1].class +
                                '" text-capitalized>' +
                                statusObj[1].title +
                                '</span>'
                            );
                        }
                    },
                    {
                        // Actions
                        targets: -1,
                        title: 'Thao tác',
                        searchable: false,
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button class="btn btn-sm btn-icon edit-btn" data-bs-toggle="modal" data-bs-target="#editRoleModal" value="' + data + '">' +
                                '<i class="ti ti-edit"></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-btn" value="' + data + '"><i class="ti ti-trash ti-sm mx-2"></i></button>' +
                                '</div>'
                            );
                        }
                    }
                ],
                order: [[1, 'desc']],
                dom:
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-4 col-lg-6" l>' +
                    '<"col-sm-12 col-md-8 col-lg-6"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1"<"me-3"f><"user_role w-px-200 pb-3 pb-sm-0">>>' +
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
                // For responsive popup
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return 'Details of ' + data['name'];
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
                initComplete: function () {
                    // Adding role filter once table initialized
                    this.api()
                        .columns(1)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserRole" class="form-select text-capitalize"><option value=""> Chọn quyền </option></select>'
                            )
                                .appendTo('.user_role')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                });
                        });
                }
            });
        }
        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);

        //For store role
        $('#add-btn').click(function (e) {
            e.preventDefault();
            var name = $('#store-name').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);

            $.ajax({
                url: "{{route('roles.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                    $('#addRoleModal').modal('hide');
                    dtRole.ajax.reload();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                $('#create-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.store-' + key + '-error').text(value[0]);
                });
            });
        });

        //For edit category
        $('.datatables-roles').on('click', '.edit-btn', function () {
            var id = $(this).val();
            $.ajax({
                url: "roles/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.success !== 200) {
                    Swal.fire({ title: res.message, icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#update-id').val(res.data.id);
                $('#update-name').val(res.data.name);
            });
        });

        //For update category
        $('#update-btn').click(function (e) {
            e.preventDefault();
            var id = $('#update-id').val();
            var name = $('#update-name').val();
            var permissions = [];
            $('.update-permissions:checked').each(function () {
                permissions.push($(this).val());
            });

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);
            formDataUpdate.append("permissions", permissions);

            $.ajax({
                url: 'roles/' + id + '/update',
                method: "post",
                data: formDataUpdate,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                    $('#editRoleModal').modal('hide');
                    dtRole.ajax.reload();
                } else {
                    return;
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                $('#create-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.update-' + key + '-error').text(value[0]);
                });
            });
        });

        //For delete category
        $('.datatables-roles').on('click', '.delete-btn', function () {
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
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: "roles/" + id,
                        method: "delete",
                        data: { "_token": "{{csrf_token()}}" }
                    }).done(function (res) {
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa thành công!',
                                text: 'Danh mục đã được cập nhật.',
                                customClass: {
                                    confirmButton: 'btn btn-success waves-effect waves-light'
                                }
                            });
                            dtRole.ajax.reload();
                        }
                    });
                }
            });
        });
    });

    (function () {
        // On edit role click, update text
        var roleEditList = document.querySelectorAll('.role-edit-modal'),
            roleAdd = document.querySelector('.add-new-role'),
            roleTitle = document.querySelector('.role-title');

        roleAdd.onclick = function () {
            roleTitle.innerHTML = 'Thêm vai trò';
        };
        if (roleEditList) {
            roleEditList.forEach(function (roleEditEl) {
                roleEditEl.onclick = function () {
                    roleTitle.innerHTML = 'Sửa';
                };
            });
        }
    })();
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Danh sách vai trò người dùng</h4>

    <br class="mb-4">
    Mỗi vai trò cung cấp quyền truy cập vào các tính năng đã được xác định trước tuỳ thuộc</br>
    vào vai trò được giao, quản trị viên có vai trò cao nhất trong hệ thống.
    </p>
    <!-- Role cards -->
    <div class="row g-4">

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="../../assets/img/illustrations/add-new-roles.png"
                                class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="btn btn-primary mb-2 text-nowrap add-new-role">
                                Thêm vai trò mới
                            </button>
                            <p class="mb-0 mt-1">Thêm vai trò</br> nếu nó chưa tồn tại</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-roles table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/ Role Table -->
        </div>
    </div>
    <!--/ Role cards -->

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Thêm vai trò mới</h3>
                        <p class="text-muted">Cài đặt quyền cho vai trò</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        <div class="col-12 mb-4">
                            <label class="form-label" for="modalRoleName">Tên vai trò</label>
                            <input type="text" id="store-name" name="modalRoleName" class="form-control"
                                placeholder="Tên vai trò" tabindex="-1" />
                            <div class="text-danger store-name-error"></div>
                        </div>
                        <div class="col-12">
                            <h5>Chọn quyền</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-medium">
                                                Quản trị viên
                                                <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Cho phép truy cập toàn bộ hệ thống"></i>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="selectAll" />
                                                    <label class="form-check-label" for="selectAll"> Select All </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-medium">Quản lý người dùng</td>
                                            <td>
                                                <div class="d-flex">
                                                    @foreach ($permissions as $permission)

                                                        <div class="form-check me-3 me-lg-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                class="store-permissions[]" id="userManagementRead"
                                                                value={{$permission->id}} />
                                                            <label class="form-check-label" for="userManagementRead">
                                                                {{$permission->name}}
                                                            </label>
                                                        </div>
                                                        <!-- <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Write
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate">
                                                                        Tạo </label> -->

                                                    @endforeach
                                                </div>
                            </div>
                            </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Content Management</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox"
                                                id="contentManagementRead" />
                                            <label class="form-check-label" for="contentManagementRead">
                                                Read </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox"
                                                id="contentManagementWrite" />
                                            <label class="form-check-label" for="contentManagementWrite">
                                                Write </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="contentManagementCreate" />
                                            <label class="form-check-label" for="contentManagementCreate">
                                                Create </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Disputes Management</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                                            <label class="form-check-label" for="dispManagementRead"> Read
                                            </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                                            <label class="form-check-label" for="dispManagementWrite"> Write
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                                            <label class="form-check-label" for="dispManagementCreate">
                                                Create </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Database Management</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                                            <label class="form-check-label" for="dbManagementRead"> Read
                                            </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                                            <label class="form-check-label" for="dbManagementWrite"> Write
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                                            <label class="form-check-label" for="dbManagementCreate"> Create
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Financial Management</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="finManagementRead" />
                                            <label class="form-check-label" for="finManagementRead"> Read
                                            </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                                            <label class="form-check-label" for="finManagementWrite"> Write
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                                            <label class="form-check-label" for="finManagementCreate">
                                                Create </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Reporting</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="reportingRead" />
                                            <label class="form-check-label" for="reportingRead"> Read
                                            </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="reportingWrite" />
                                            <label class="form-check-label" for="reportingWrite"> Write
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="reportingCreate" />
                                            <label class="form-check-label" for="reportingCreate"> Create
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">API Control</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="apiRead" />
                                            <label class="form-check-label" for="apiRead"> Read </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="apiWrite" />
                                            <label class="form-check-label" for="apiWrite"> Write </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="apiCreate" />
                                            <label class="form-check-label" for="apiCreate"> Create </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Repository Management</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="repoRead" />
                                            <label class="form-check-label" for="repoRead"> Read </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="repoWrite" />
                                            <label class="form-check-label" for="repoWrite"> Write </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="repoCreate" />
                                            <label class="form-check-label" for="repoCreate"> Create
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap fw-medium">Payroll</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="payrollRead" />
                                            <label class="form-check-label" for="payrollRead"> Read </label>
                                        </div>
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" id="payrollWrite" />
                                            <label class="form-check-label" for="payrollWrite"> Write
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="payrollCreate" />
                                            <label class="form-check-label" for="payrollCreate"> Create
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                </div>
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1" id="add-btn">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Huỷ
                    </button>
                </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="role-title mb-2">Sửa vai trò</h3>
                    <p class="text-muted">Cài đặt quyền cho vai trò</p>
                </div>
                <!-- Edit role form -->
                <form id="addRoleForm" class="row g-3" onsubmit="return false">
                    <div class="col-12 mb-4">
                        <label class="form-label" for="modalRoleName">Tên vai trò</label>
                        <input type="number" id="update-id" hidden />
                        <input type="text" id="update-name" name="modalRoleName" class="form-control"
                            placeholder="Tên vai trò" tabindex="-1" />
                        <div class="text-danger update-name-error"></div>
                    </div>
                    <div class="col-12">
                        <h5>Chọn quyền</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-medium">
                                            Quản trị viên
                                            <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Cho phép truy cập toàn bộ hệ thống"></i>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý người dùng</td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input update-permissions" type="checkbox"
                                                            name="update-permissions[]"
                                                            value='{{$permission->id}}' />
                                                        <label class="form-check-label" for="update-permissions">
                                                            {{$permission->name}}
                                                        </label>
                                                    </div>
                                                    <!-- <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Write
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate">
                                                                        Tạo </label> -->

                                                @endforeach
                                            </div>
                        </div>
                        </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Content Management</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                                        <label class="form-check-label" for="contentManagementRead">
                                            Read </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                                        <label class="form-check-label" for="contentManagementWrite">
                                            Write </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                                        <label class="form-check-label" for="contentManagementCreate">
                                            Create </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Disputes Management</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                                        <label class="form-check-label" for="dispManagementRead"> Read
                                        </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                                        <label class="form-check-label" for="dispManagementWrite"> Write
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                                        <label class="form-check-label" for="dispManagementCreate">
                                            Create </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Database Management</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                                        <label class="form-check-label" for="dbManagementRead"> Read
                                        </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                                        <label class="form-check-label" for="dbManagementWrite"> Write
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                                        <label class="form-check-label" for="dbManagementCreate"> Create
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Financial Management</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="finManagementRead" />
                                        <label class="form-check-label" for="finManagementRead"> Read
                                        </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                                        <label class="form-check-label" for="finManagementWrite"> Write
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                                        <label class="form-check-label" for="finManagementCreate">
                                            Create </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Reporting</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="reportingRead" />
                                        <label class="form-check-label" for="reportingRead"> Read
                                        </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="reportingWrite" />
                                        <label class="form-check-label" for="reportingWrite"> Write
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="reportingCreate" />
                                        <label class="form-check-label" for="reportingCreate"> Create
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">API Control</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="apiRead" />
                                        <label class="form-check-label" for="apiRead"> Read </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="apiWrite" />
                                        <label class="form-check-label" for="apiWrite"> Write </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="apiCreate" />
                                        <label class="form-check-label" for="apiCreate"> Create </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Repository Management</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="repoRead" />
                                        <label class="form-check-label" for="repoRead"> Read </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="repoWrite" />
                                        <label class="form-check-label" for="repoWrite"> Write </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="repoCreate" />
                                        <label class="form-check-label" for="repoCreate"> Create
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap fw-medium">Payroll</td>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="payrollRead" />
                                        <label class="form-check-label" for="payrollRead"> Read </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" type="checkbox" id="payrollWrite" />
                                        <label class="form-check-label" for="payrollWrite"> Write
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="payrollCreate" />
                                        <label class="form-check-label" for="payrollCreate"> Create
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="update-btn">Lưu</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Huỷ
                </button>
            </div>
            </form>
            <!--/ Edit role form -->
        </div>
    </div>
</div>
</div>
<!--/ Edit Role Modal -->

</div>
@endsection
