@extends('layout')
@section('js')
<script>
    $(function () {
        var dataTablePermissions = $('.datatables-permissions'), dt_permission;
        //Initialization FormData to implementing function store & update
        var formDataStore = new FormData();
        var formDataUpdate = new FormData();

        // Users List datatable
        if (dataTablePermissions.length) {
            dt_permission = dataTablePermissions.DataTable({
                ajax: { url: '{{route('permissions.data-table')}}'  , method:'get', dataType:'json'},
                columns: [
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
                        render: function (data, type, full, meta) {
                            return '';
                        }
                    },
                    {
                        searchable: false,
                        visible: false
                    },
                    {
                        // Name

                        render: function (data, type, full, meta) {
                            var $name = full['name'];
                            return '<span class="text-nowrap">' + $name + '</span>';
                        }
                    },
                    // {
                    //     // User Role
                    //     targets: 3,
                    //     orderable: false,
                    //     render: function (data, type, full, meta) {
                    //         var $assignedTo = full['assigned_to'],
                    //             $output = '';
                    //         var roleBadgeObj = {
                    //             Admin: '<a href="' + userList + '"><span class="badge bg-label-primary m-1">Administrator</span></a>',
                    //             Manager: '<a href="' + userList + '"><span class="badge bg-label-warning m-1">Manager</span></a>',
                    //             Users: '<a href="' + userList + '"><span class="badge bg-label-success m-1">Users</span></a>',
                    //             Support: '<a href="' + userList + '"><span class="badge bg-label-info m-1">Support</span></a>',
                    //             Restricted:
                    //                 '<a href="' + userList + '"><span class="badge bg-label-danger m-1">Restricted User</span></a>'
                    //         };
                    //         for (var i = 0; i < $assignedTo.length; i++) {
                    //             var val = $assignedTo[i];
                    //             $output += roleBadgeObj[val];
                    //         }
                    //         return '<span class="text-nowrap">' + full['name'] + '</span>';
                    //     }
                    // },
                    {
                        orderable: false,
                        render: function (data, type, full, meta) {
                            var $date = full['created_at'];
                            return '<span class="text-nowrap">' + $date + '</span>';
                        }
                    },
                    {
                        orderable: false,
                        render: function (data, type, full, meta) {
                            var $date = full['updated_at'];
                            return '<span class="text-nowrap">' + $date + '</span>';
                        }
                    },
                    {
                        // Actions
                        targets: -1,
                        searchable: false,
                        title: 'Thao tác',
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return (
                                '<span class="text-nowrap"><button class="btn btn-sm btn-icon me-2 editBtn" value='+full['id']+' data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit"></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-btn" value='+full['id']+'><i class="ti ti-trash"></i></button></span>'
                            );
                        }
                    }
                ],
                order: [[1, 'asc']],
                dom:
                    '<"row mx-1"' +
                    '<"col-sm-12 col-md-3" l>' +
                    '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>' +
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
                        text: 'Thêm quyền',
                        className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'modal',
                            'data-bs-target': '#addPermissionModal'
                        },
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],
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
                        .columns(3)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
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

        //Clear form add
        $('#addPermissionModal').on('hidden.bs.modal', function () {
            $('#store-name').val("");
            $('.store-name-error').text("");
        });

        //Clear form edit
        $('#editPermissionModal').on('hidden.bs.modal', function () {
            $('#update-name').val("");
            $('.update-name-error').text("");
        });

        //For store category
        $('#add-btn').click(function (e) {
            e.preventDefault();
            var name = $('#store-name').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);

            $.ajax({
                url: "{{route('permissions.store')}}",
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
                    $('#addPermissionModal').modal('hide');
                    dt_permission.ajax.reload();
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
        $('.datatables-permissions').on('click', '.editBtn', function () {
            var id = $(this).val();
            $.ajax({
                url: "permissions/" + id + "/edit",
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

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);

            $.ajax({
                url: 'permissions/' + id + '/update',
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
                    $('#editPermissionModal').modal('hide');
                    dt_permission.ajax.reload();
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
        $('.datatables-permissions').on('click', '.delete-btn', function () {
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
                        url: "permissions/" + id + "/destroy",
                        method: "post",
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
                            dt_permission.ajax.reload(); //ref   resh bảng
                        }
                    });
                }
            });
        });
    });
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Danh sách quyền</h4>

    <p class="mb-4">
        Mỗi mục bao gồm ba vai trò được xác định trước được hiển thị bên dưới.
    </p>

    <!-- Permission Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-permissions table border-top">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--/ Permission Table -->

    <!-- Modal -->
    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Thêm quyền mới</h3>
                        <p class="text-muted">Bạn có thể gán quyền cho người dùng.</p>
                    </div>
                    <form id="addPermissionForm" class="row" onsubmit="return false">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="store-name">Tên quyền</label>
                            <input type="text" id="store-name" name="store-name" class="form-control"
                                placeholder="Tên quyền" autofocus />
                            <div class="text-danger store-name-error"></div>
                        </div>
                        <!-- <div class="col-12 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="corePermission" />
                                <label class="form-check-label" for="corePermission"> Đặt làm quyền chính </label>
                            </div>
                        </div> -->
                        <div class="col-12 text-center demo-vertical-spacing">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1" id="add-btn">Thêm</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Huỷ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Permission Modal -->

    <!-- Edit Permission Modal -->
    <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Sửa quyền</h3>
                        <p class="text-muted">Chỉnh sửa quyền theo yêu cầu của bạn.</p>
                    </div>
                    <form id="editPermissionForm" class="row" onsubmit="return false">
                    <input type="number" id="update-id" hidden />
                    <div class="col-12 mb-3">
                            <label class="form-label" for="update-name">Tên quyền</label>
                            <input type="text" id="update-name" name="update-name" class="form-control"
                                placeholder="Tên quyền" autofocus />
                            <div class="text-danger update-name-error"></div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1" id="update-btn">Cập nhật</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Huỷ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit Permission Modal -->

    <!-- /Modal -->
</div>
@endsection
