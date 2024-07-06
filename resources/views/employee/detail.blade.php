@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-user-view.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
<script>
    'use strict';
    (function () {
        const suspendUser = document.querySelector('.suspend-user');

        // Suspend User javascript
        if (suspendUser) {
            suspendUser.onclick = function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert user!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Suspend user!',
                    customClass: {
                        confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
                        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Suspended!',
                            text: 'User has been suspended.',
                            customClass: {
                                confirmButton: 'btn btn-success waves-effect waves-light'
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Cancelled',
                            text: 'Cancelled Suspension :)',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-success waves-effect waves-light'
                            }
                        });
                    }
                });
            };
        }

        //? Billing page have multiple buttons
        // Cancel Subscription alert
        const cancelSubscription = document.querySelectorAll('.cancel-subscription');

        // Alert With Functional Confirm Button
        if (cancelSubscription) {
            cancelSubscription.forEach(btnCancle => {
                btnCancle.onclick = function () {
                    Swal.fire({
                        text: 'Are you sure you would like to cancel your subscription?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        customClass: {
                            confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
                            cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        if (result.value) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Unsubscribed!',
                                text: 'Your subscription cancelled successfully.',
                                customClass: {
                                    confirmButton: 'btn btn-success waves-effect waves-light'
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: 'Cancelled',
                                text: 'Unsubscription Cancelled!!',
                                icon: 'error',
                                customClass: {
                                    confirmButton: 'btn btn-success waves-effect waves-light'
                                }
                            });
                        }
                    });
                };
            });
        }
    })();
</script>
<script>
    /**
 * App User View - Account (jquery)
 */

    $(function () {
        'use strict';

        // Variable declaration for table
        var dt_project_table = $('.datatable-project');

        // Project datatable
        // --------------------------------------------------------------------
        if (dt_project_table.length) {
            var dt_project = dt_project_table.DataTable({
                columns: [
                    // columns according to JSON
                    { data: 'hours' },
                    { data: 'project_name' },
                    { data: 'total_task' },
                    { data: 'progress' },
                    { data: 'hours' }
                ],
                columnDefs: [
                    {
                        // For Responsive
                        className: 'control',
                        searchable: false,
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function (data, type, full, meta) {
                            return '';
                        }
                    },

                    {
                        // User full name and email
                        targets: 1,
                        responsivePriority: 1,
                        render: function (data, type, full, meta) {
                            var $name = full['project_name'],
                                $framework = full['framework'],
                                $image = full['project_image'];
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="' +
                                    assetsPath +
                                    'img/icons/brands/' +
                                    $image +
                                    '" alt="Project Image" class="rounded-circle">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6) + 1;
                                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $name = full['full_name'],
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                            }
                            // Creates full output for row
                            var $row_output =
                                '<div class="d-flex justify-content-left align-items-center">' +
                                '<div class="avatar-wrapper">' +
                                '<div class="avatar avatar-sm me-3">' +
                                $output +
                                '</div>' +
                                '</div>' +
                                '<div class="d-flex flex-column">' +
                                '<span class="text-truncate fw-medium">' +
                                $name +
                                '</span>' +
                                '<small class="text-muted">' +
                                $framework +
                                '</small>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    {
                        targets: 2,
                        orderable: false
                    },
                    {
                        // Label
                        targets: 3,
                        responsivePriority: 3,
                        render: function (data, type, full, meta) {
                            var $progress = full['progress'] + '%',
                                $color;
                            switch (true) {
                                case full['progress'] < 25:
                                    $color = 'bg-danger';
                                    break;
                                case full['progress'] < 50:
                                    $color = 'bg-warning';
                                    break;
                                case full['progress'] < 75:
                                    $color = 'bg-info';
                                    break;
                                case full['progress'] <= 100:
                                    $color = 'bg-success';
                                    break;
                            }
                            return (
                                '<div class="d-flex flex-column"><small class="mb-1">' +
                                $progress +
                                '</small>' +
                                '<div class="progress w-100 me-3" style="height: 6px;">' +
                                '<div class="progress-bar ' +
                                $color +
                                '" style="width: ' +
                                $progress +
                                '" aria-valuenow="' +
                                $progress +
                                '" aria-valuemin="0" aria-valuemax="100"></div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    },
                    {
                        targets: 4,
                        orderable: false
                    }
                ],
                order: [[1, 'desc']],
                dom:
                    '<"d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row"' +
                    '<"col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center"l>' +
                    '<"col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center"f>' +
                    '>t' +
                    '<"d-flex justify-content-between mx-4 row"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                displayLength: 7,
                lengthMenu: [7, 10, 25, 50, 75, 100],
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
                                return 'Details of ' + data['full_name'];
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
                }
            });
        }


        // On each datatable draw, initialize tooltip
        dt_invoice_table.on('draw.dt', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    boundary: document.body
                });
            });
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });

</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Thông tin tài khoản</h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="/{{$employee->avatar}}" height="100"
                                width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{$employee->full_name}}</h4>
                                @foreach ($employee->roles as $role)
                                    <span class="badge bg-label-secondary mt-1">{{$role->name}}</span>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">1.23k</p>
                                <small>Tasks Done</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i
                                    class="ti ti-briefcase ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">568</p>
                                <small>Projects Done</small>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 small text-uppercase text-muted">Thông tin chi tiết</p>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="fw-medium me-1">Tên:</span>
                                <span>{{$employee->full_name}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Email:</span>
                                <span>{{$employee->email}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Trạng thái:</span>
                                <span
                                    class="badge bg-label-success">{{$employee->status ? 'Hoạt động' : 'Không hoạt động'}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Vai trò:</span>
                                @foreach ($employee->roles as $role)
                                    <span class="badge bg-label-secondary mt-1">{{$role->name}}</span>
                                @endforeach
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Liên hệ:</span>
                                <span>{{$employee->phone}}</span>
                            </li>
                            <li class="pt-1">
                                <span class="fw-medium me-1">Địa chỉ:</span>

                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">Chỉnh sửa</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="ti ti-user-check ti-xs me-1"></i>Tài
                        khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app-user-view-security.html"><i
                            class="ti ti-lock ti-xs me-1"></i>Bảo mật</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="app-user-view-billing.html"><i
                            class="ti ti-currency-dollar ti-xs me-1"></i>Billing & Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app-user-view-notifications.html"><i
                            class="ti ti-bell ti-xs me-1"></i>Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app-user-view-connections.html"><i
                            class="ti ti-link ti-xs me-1"></i>Connections</a>
                </li> -->
            </ul>
            <!--/ User Pills -->

            <!-- Project table -->
            <div class="card mb-4">
                <h5 class="card-header">Danh sách hóa đơn</h5>
                <div class="table-responsive mb-3">
                    <table class="table datatable-project border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Project</th>
                                <th class="text-nowrap">Total Task</th>
                                <th>Progress</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /Project table -->
        </div>
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit User Information</h3>
                        <p class="text-muted">Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-3" onsubmit="return false">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                class="form-control" placeholder="John" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                class="form-control" placeholder="Doe" />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="modalEditUserName">Username</label>
                            <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control"
                                placeholder="john.doe.007" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email</label>
                            <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control"
                                placeholder="example@domain.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserStatus">Status</label>
                            <select id="modalEditUserStatus" name="modalEditUserStatus" class="select2 form-select"
                                aria-label="Default select example">
                                <option selected>Status</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                                <option value="3">Suspended</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditTaxID">Tax ID</label>
                            <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">US (+1)</span>
                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                    class="form-control phone-number-mask" placeholder="202 555 0111" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLanguage">Language</label>
                            <select id="modalEditUserLanguage" name="modalEditUserLanguage" class="select2 form-select"
                                multiple>
                                <option value="">Select</option>
                                <option value="english" selected>English</option>
                                <option value="spanish">Spanish</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                                <option value="dutch">Dutch</option>
                                <option value="hebrew">Hebrew</option>
                                <option value="sanskrit">Sanskrit</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserCountry">Country</label>
                            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select"
                                data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="switch">
                                <input type="checkbox" class="switch-input" />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">Use as a billing address?</span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->
    <!-- /Modal -->
</div>
@endsection
