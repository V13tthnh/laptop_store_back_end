@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script>
    'use strict';

    $(function () {
        var dt_order_table = $('.invoice-list-table');

        if (dt_order_table.length) {
            const statusObj = {
                1: { title: 'Chờ duyệt', class: 'bg-label-warning' },
                2: { title: 'Đã duyệt', class: 'bg-label-success' },
                3: { title: 'Đã giao', class: 'bg-label-info' },
                4: { title: 'Hủy', class: 'bg-label-danger' }
            },
                formalityObj = {
                    0: { title: 'Tiền mặt', class: 'bg-label-success' },
                    1: { title: 'Chuyển khoản', class: 'bg-label-info' }
                };
            var dt_order = dt_order_table.DataTable({
                ajax: { url: '{{route('orders.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'id', name: 'id'
                    },
                    {
                        data: 'name', name: 'name'
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
                        data: 'format', render: function (data, type, full, meta) {
                            var $formality = full['format'];

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
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a>' +
                                '<a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a>' +
                                '<div class="dropdown">' +
                                '<a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>' +
                                '<div class="dropdown-menu dropdown-menu-end">' +
                                '<a href="javascript:;" class="dropdown-item">Download</a>' +
                                '<a href="app-invoice-edit.html" class="dropdown-item">Edit</a>' +
                                '<a href="javascript:;" class="dropdown-item">Duplicate</a>' +
                                '<div class="dropdown-divider"></div>' +
                                '<a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                ],
                columnDefs: [],
                order: [[1, 'desc']],
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
                // Buttons with Dropdown
                buttons: [

                ],
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
                },
                initComplete: function () {
                    // Adding role filter once table initialized
                    this.api()
                        .columns(7)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserRole" class="form-select"><option value=""> Lọc theo trạng thái </option></select>'
                            )
                                .appendTo('.invoice_status')
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

        // On each datatable draw, initialize tooltip
        dt_order_table.on('draw.dt', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    boundary: document.body
                });
            });
        });

        // Delete Record
        $('.invoice-list-table tbody').on('click', '.delete-record', function () {
            dt_order.row($(this).parents('tr')).remove().draw();
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
        <div class="card-datatable table-responsive">
            <table class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Khách hàng</th>
                        <th>SĐT</th>
                        <th class="text-truncate">Chiết khấu</th>
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
