@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script>
    'use strict';

    $(function () {
        const selectPicker = $('.selectpicker'),
            select2 = $('.select2'),
            select2Icons = $('.select2-icons');

        if (selectPicker.length) {
            selectPicker.selectpicker();
        }
        var dt_order_table = $('.order-list-table');

        if (dt_order_table.length) {
            const statusObj = {
                1: { title: 'Chờ duyệt', class: 'bg-label-warning' },
                2: { title: 'Đã duyệt', class: 'bg-label-success' },
                3: { title: 'Đang giao hàng', class: 'bg-label-info' },
                4: { title: 'Hủy', class: 'bg-label-danger' },
                5: { title: 'Đã nhân được hàng', class: 'bg-label-success' }
            };
            var dt_order = dt_order_table.DataTable({
                ajax: { url: '{{route('orders.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'id', name: 'id'
                    },
                    {
                        data: 'user_name', name: 'user.full_name'
                    },
                    { data: 'phone', name: 'phone' },
                    { data: 'discount', name: 'discount' },
                    {
                        data: 'total', render: function (data, type, full, meta) {
                            var $total = data;
                            return '<span class="d-none">' + $total + '</span>' + $total;
                        }
                    },
                    {
                        data: 'formality', render: function (data, type, full, meta) {
                            const formalityObj = {
                                2: { title: 'Tiền mặt', class: 'bg-label-success' },
                                1: { title: 'Chuyển khoản', class: 'bg-label-info' }
                            };
                            var $formality = data;

                            return (
                                '<span class="badge px-2 ' +
                                formalityObj[$formality].class +
                                '" text-capitalized>' +
                                formalityObj[$formality].title +
                                '</span>'
                            );

                        }
                    },
                    {
                        data: 'status', render: function (data, type, full, meta) {

                            var $status = full['status'];

                            return (
                                '<span class="badge px-2 ' +
                                statusObj[$status].class +
                                '" text-capitalized>' +
                                statusObj[$status].title +
                                '</span>'
                            );
                        }
                    },
                    {
                        data: 'id', render: function (data, type, row) {
                            if (row.status === 1) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/orders/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item update-status" data-status="' + row.status + '" value="' + data + '">Duyệt đơn</button>' +
                                    '<button href="javascript:0;" class="dropdown-item data-status update-status" data-status="3" value="' + data + '">' +
                                    'Hủy đơn' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else if (row.status === 2) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/orders/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item update-status" data-status="' + row.status + '" value="' + data + '">Đang giao hàng</button>' +
                                    '<button class="dropdown-item send-mail" data-status="' + row.status + '" value="' + data + '">Gửi mail</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else if (row.status === 3) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<button class="dropdown-item update-status" data-status="' + 4 + '" value="' + data + '">Đã nhận được hàng</button>' +
                                    '<button class="dropdown-item send-mail" data-status="' + row.status + '" value="' + data + '">Gửi mail</button>' +
                                    '<a href="/admin/orders/' + data + '" class="dropdown-item">Xem</a>' +
                                    '</div>' +
                                    '</div>'

                                );
                            } else if (row.status === 4) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/orders/' + data + '" class="dropdown-item">Xem</a>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/orders/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item send-mail" data-status="' + row.status + '" value="' + data + '">Gửi mail</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }
                        }
                    }
                ],
                columnDefs: [],
                dom:
                    '<"row mx-1"' +
                    '<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>>' +
                    '<"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-3"f<"invoice_status mb-3 mb-md-0">>' +
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
                buttons: [],
            });
        }

        dt_order_table.on('draw.dt', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    boundary: document.body
                });
            });
        });

        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);

        $('.order-list-table').on('click', '.update-status', function () {
            var data = $(this).data();
            var id = $(this).val();
            $.ajax({
                url: '/admin/orders/update-status',
                method: 'post',
                data: { '_token': "{{csrf_token()}}", id: id, status: data.status },
                success: function (response) {
                    if (response.status) {
                        successNotification("Cập nhật thành công");
                        dt_order.ajax.reload();
                    }
                }
            });
        });

        $('.order-list-table').on('click', '.send-mail', function () {
            var orderId = $(this).val();
            $.ajax({
                url: '/admin/orders/send-email',
                method: 'post',
                data: { '_token': "{{csrf_token()}}", order_id: orderId },
                success: function (response) {
                    if (response.message) {
                        successNotification(response.message);
                    }
                }
            });
        });

        $('#filter-btn').click(function () {
            if (typeof dt_order_table !== 'undefined' && dt_order_table !== null) {
                var statusFilter = $('.filter-status option:selected').val();
                var formalityFilter = $('.filter-formality option:selected').val();

                dt_order.ajax.url('{{ route('orders.data.table') }}' + '?status=' + statusFilter + '&formality=' + formalityFilter).load();
            } else {
                console.error('DataTable not initialized or found.');
            }
        });

        $('#reset-filter-btn').click(function () {
            if (typeof dt_order_table !== 'undefined' && dt_order_table !== null) {
                dt_order.ajax.url('{{ route('orders.data.table') }}').load();
            } else {
                console.error('DataTable not initialized or found.');
            }
        });

        function successNotification(message) {
            Swal.fire({
                position: 'center',
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

    });
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Hóa đơn</h4>

    <!-- Invoice List Widget -->
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{$user_has_orders_count}}</h3>
                                <p class="mb-0">Người dùng đã mua hàng</p>
                            </div>
                            <span class="avatar me-sm-4">
                                <span class="avatar-initial bg-label-secondary rounded"><i
                                        class="ti ti-user ti-md"></i></span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4" />
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{$order_count}}</h3>
                                <p class="mb-0">Số lượng hóa đơn</p>
                            </div>
                            <span class="avatar me-lg-4">
                                <span class="avatar-initial bg-label-secondary rounded"><i
                                        class="ti ti-file-invoice ti-md"></i></span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none" />
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h3 class="mb-1">{{number_format($order_paid_sum, 0, ',', '.') . ' đ'}}</h3>
                                <p class="mb-0">Đã thanh toán</p>
                            </div>
                            <span class="avatar me-sm-4">
                                <span class="avatar-initial bg-label-secondary rounded"><i
                                        class="ti ti-checks ti-md"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="mb-1">{{number_format($order_unpaid_sum, 0, ',', '.') . ' đ'}}</h3>
                                <p class="mb-0">Chưa thanh toán</p>
                            </div>
                            <span class="avatar">
                                <span class="avatar-initial bg-label-secondary rounded"><i
                                        class="ti ti-circle-off ti-md"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Lọc hóa đơn:</h5>
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <div class="col-md-4 mb-4">
                    <label for="selectpickerBasic" class="form-label">Trạng thái</label>
                    <select id="selectpickerBasic" class="selectpicker w-100 filter-status" data-style="btn-default">
                        <option value="">--Chọn trạng thái hóa đơn--</option>
                        <option value="1">Chưa xác nhận</option>
                        <option value="2">Đã xác nhận</option>
                        <option value="3">Đang giao</option>
                        <option value="4">Đã hủy</option>
                        <option value="5">Đã nhận được hàng</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="selectpickerBasic" class="form-label">Phương thức thanh toán</label>
                    <select id="selectpickerBasic" class="selectpicker w-100 filter-formality" data-style="btn-default">
                        <option value="">--Chọn phương thức thanh toán--</option>
                        <option value="2">Tiền mặt</option>
                        <option value="1">VNPay</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <button id="filter-btn" class="btn btn-primary waves-effect waves-light mt-4">Lọc</button>
                    <button id="reset-filter-btn" class="btn btn-primary waves-effect waves-light mt-4">Xem tất cả hóa
                        đơn</button>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="order-list-table table border-top">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Khách hàng</th>
                        <th>SĐT</th>
                        <th class="text-truncate">Giảm giá</th>
                        <th>Tổng tiền</th>
                        <th>Hình thưc</th>
                        <th>Trạng thái</th>
                        <th class="cell-fit">Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
