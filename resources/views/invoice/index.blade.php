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
        let borderColor, bodyBg, headingColor;

        if (isDarkStyle) {
            borderColor = config.colors_dark.borderColor;
            bodyBg = config.colors_dark.bodyBg;
            headingColor = config.colors_dark.headingColor;
        } else {
            borderColor = config.colors.borderColor;
            bodyBg = config.colors.bodyBg;
            headingColor = config.colors.headingColor;
        }

        // Variable declaration for table

        var dt_invoice_table = $('.datatables-invoices'),
            statusObj = {
                1: { title: 'Chờ duyệt', class: 'bg-label-warning' },
                2: { title: 'Đã duyệt', class: 'bg-label-success' },
                3: { title: 'Đã giao', class: 'bg-label-info' },
                4: { title: 'Hủy', class: 'bg-label-danger' }
            },
            formalityObj = {
                1: { title: 'Tiền mặt', class: 'bg-label-success' },
                2: { title: 'Chuyển khoản', class: 'bg-label-info' },
                3: { title: 'Khác', class: 'bg-label-danger' },
            };

        if (dt_invoice_table.length) {
            var dt_invoices = dt_invoice_table.DataTable({
                ajax: { url: "{{route('invoices.data.table')}}", method: "get", dataType: "json"},
                columns: [
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            var $order_id = full['id'];
                            var $row_output = '<a href="/admin/invoices/' + $order_id + '"><span>#' + $order_id + '</span></a>';
                            return $row_output;
                        }
                    },
                    { data: 'user_name', name: 'user.full_name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'supplier_name', name: "supplier.name" },
                    { data: 'total', name: 'total' },
                    {
                        data: 'formality', render: function (data, type, full, meta) {
                            var $formality = full['formality'];

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
                                    '<a href="/admin/invoices/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item update-status" data-status="' + row.status + '" value="' + data + '">Duyệt đơn</button>' +
                                    '<a class="dropdown-item" href="/admin/invoices/' + data + '/edit">Chỉnh sửa</a>' +
                                    '<button href="javascript:0;" class="dropdown-item data-status" data-status="3">' +
                                    'Hủy' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else if (row.status === 2) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/invoices/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item update-status" data-status="' + row.status + '" value="' + data + '">Đã giao</button>' +
                                    '<a class="dropdown-item" href="/admin/invoices/' + data + '/edit">Chỉnh sửa</a>' +
                                    '<button href="javascript:0;" class="dropdown-item update-status" data-status="3" value="' + data + '">' +
                                    'Hủy' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else if (row.status === 3) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/invoices/' + data + '" class="dropdown-item">Xem</a>' +
                                    '</div>' +
                                    '</div>'

                                );
                            } else if (row.status === 4) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/invoices/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<button class="dropdown-item update-status" data-status="' + row.status + '" value="' + data + '">Đã giao</button>' +
                                    '<a class="dropdown-item" href="/admin/invoices/' + data + '/edit">Chỉnh sửa</a>' +
                                    '<button class="dropdown-item update-status" data-status="0" value="' + data + '">' +
                                    'Yêu cầu duyệt' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<a href="/admin/invoices/' + data + '" class="dropdown-item">Xem</a>' +
                                    '<a class="dropdown-item" href="/admin/invoices/' + data + '/edit">Chỉnh sửa</a>' +
                                    '<button class="dropdown-item update-status" data-status="3" value="' + data + '">' +
                                    'Hủy' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }
                        },
                    },
                ],
                dom:
                    '<"card-header pb-md-2 d-flex flex-column flex-md-row align-items-start align-items-md-center"<f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0 gap-2"l<"dt-action-buttons"B>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                lengthMenu: [10, 40, 60, 80, 100],
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
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn btn-label-secondary dropdown-toggle waves-effect waves-light',
                        text: '<i class="ti ti-download me-1"></i>Export',
                        buttons: [
                            {
                                extend: 'print',
                                text: '<i class="ti ti-printer me-2"></i>Print',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 7],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('order-name')) {
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
                                    // Customize print view for dark
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
                                text: '<i class="ti ti-file me-2"></i>Csv',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 7],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('order-name')) {
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
                                text: '<i class="ti ti-file-export me-2"></i>Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 7],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('order-name')) {
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
                                text: '<i class="ti ti-file-text me-2"></i>Pdf',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 7],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('order-name')) {
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
                                text: '<i class="ti ti-copy me-2"></i>Copy',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [2, 3, 4, 5, 6, 7],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('order-name')) {
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
                        text: '<i class="ti ti-plus ti-xs me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Thêm mới</span>',
                        className: 'add-new btn btn-primary ms-2 waves-effect waves-light add-btn',
                    },
                ],
                // For responsive popup
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return 'Details of ' + data['customer'];
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
            $('.dataTables_length').addClass('mt-0 mt-md-3 ms-n2');
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('ms-n3');
        }

        //go to add page
        $('.add-btn').click(function (e) {
            e.preventDefault();
            window.location.href = '/admin/invoices/create';
        });

        //update status
        $('.datatables-invoices').on('click', '.update-status', function () {
            var data = $(this).data();
            var id = $(this).val();
            $.ajax({
                url: '/admin/invoices/update-status',
                method: 'post',
                data: { '_token': "{{csrf_token()}}", id: id, status: data.status },
                success: function (response) {
                    if (response.success) {
                        successNotification("Cập nhật thành công");
                        dt_invoices.ajax.reload();
                    }
                }
            });
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

        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });

</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Trang chủ /</span> Danh sách hóa đơn bán</h4>
    @if(Session::has('successMsg'))
        <div class="alert alert-success"> {{ Session::get('successMsg') }}</div>
    @endif
    <!-- Order List Widget -->
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h4 class="mb-2">{{$pending_status_count}}</h4>
                                <p class="mb-0 fw-medium">Chờ duyệt</p>
                            </div>
                            <span class="avatar me-sm-4">
                                <span class="avatar-initial bg-label-warning rounded">
                                    <i class="ti-md ti ti-calendar-stats text-body"></i>
                                </span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4" />
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h4 class="mb-2">{{$approved_status_count}}</h4>
                                <p class="mb-0 fw-medium">Đã duyệt</p>
                            </div>
                            <span class="avatar p-2 me-lg-4">
                                <span class="avatar-initial bg-label-success rounded"><i
                                        class="ti-md ti ti-checks text-body"></i></span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none" />
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h4 class="mb-2">{{$delivered_status_count}}</h4>
                                <p class="mb-0 fw-medium">Đã giao</p>
                            </div>
                            <span class="avatar p-2 me-sm-4">
                                <span class="avatar-initial bg-label-info rounded"><i
                                        class="ti-md ti ti-wallet text-body"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="mb-2">{{$cancel_status_count}}</h4>
                                <p class="mb-0 fw-medium">Đã hủy</p>
                            </div>
                            <span class="avatar p-2">
                                <span class="avatar-initial bg-label-danger rounded"><i
                                        class="ti-md ti ti-alert-octagon text-body"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-invoices table border-top">
                <thead>
                    <tr>
                        <th>Hóa đơn</th>
                        <th>Nhân viên</th>
                        <th>Ngày nhập</th>
                        <th>Nhà cung cấp</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
