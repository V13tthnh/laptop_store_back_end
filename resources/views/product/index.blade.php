@extends('layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script>
    'use strict';
    $(function () {
        const select2 = $('.select2');

        if (select2.length) {
            select2.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    placeholder: 'Select value',
                    dropdownParent: $this.parent()
                });
            });
        }

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

        var dt_product_table = $('.datatables-products'),
            statusObj = {
                1: { title: 'Còn hàng', class: 'bg-label-success' },
                2: { title: 'Hết hàng', class: 'bg-label-danger' },
            };

        // E-commerce Products datatable
        if (dt_product_table.length) {
            var dt_products = dt_product_table.DataTable({
                ajax: { url: "{{route('products.data.table')}}", method: "get", dataType: "json", },
                columns: [
                    {
                        data: 'name', render: function (data, type, full, meta) {
                            var $name = full['name'],
                                $image = full['images'][0]?.url;
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="/' + $image + '" alt="Avatar" class="" >';
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
                    { data: 'quantity', name: 'quantity' },
                    { data: 'unit_price', name: 'unit_price' },
                    { data: 'brand_name', name: 'brand.name' },
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
                                '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                '<button class="dropdown-item detail-btn">Xem</button>' +
                                '<button class="dropdown-item edit-btn" value="'+data+'">Cập nhật</button>' +
                                '<button class="dropdown-item delete-btn" value="'+data+'">' +
                                'Xóa' +
                                '</button>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                ],
                order: [3, 'asc'], //set any columns order asc/desc
                dom:
                    '<"card-header pb-md-2 d-flex flex-column flex-md-row align-items-start align-items-md-center"<f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0 gap-2"l<"dt-action-buttons"B>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',

                lengthMenu: [10, 40, 60, 80, 100], //for length of menu
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
                        className: 'btn btn-label-secondary ms-2 dropdown-toggle waves-effect waves-light',
                        text: '<i class="ti ti-download me-2"></i>Xuất',
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
                    {
                        text: '<i class="ti ti-trash ti-xs me-0 me-sm-2"></i><span class="v-btn__content" data-no-activator="">Danh sách đã xóa</span>',
                        className: 'add-new btn btn-danger ms-2 waves-effect waves-light trash-btn',
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
                },
                initComplete: function () {
                    // Adding status filter once table initialized
                    this.api()
                        .columns(3)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="ProductStatus" class="select2 form-select text-capitalize"><option value="">Danh mục</option></select>'
                            )
                                .appendTo('.product_category')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        });
                    // Adding category filter once table initialized
                    this.api()
                        .columns(4)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="productBrand" class="select2 form-select select2 text-capitalize"><option value="">Thương hiệu</option></select>'
                            )
                                .appendTo('.product_brand')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="">' + d + '</option>');
                                });
                        });
                    // Adding stock filter once table initialized
                    // this.api()
                    //     .columns(5)
                    //     .every(function () {
                    //         var column = this;
                    //         var select = $(
                    //             '<select id="ProductStatus" class="form-select select2 text-capitalize"><option value=""> Trạng thái </option></select>'
                    //         )
                    //             .appendTo('.product_status')
                    //             .on('change', function () {
                    //                 var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    //                 column.search(val ? '^' + val + '$' : '', true, false).draw();
                    //             });

                    //         column
                    //             .data()
                    //             .unique()
                    //             .sort()
                    //             .each(function (d, j) {
                    //                 select.append('<option value="' + d + '">' + d + '</option>');
                    //             });
                    //     });
                }
            });
            $('.dataTables_length').addClass('mt-0 mt-md-3 ms-n2');
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('ms-n3');
        }

        //delete
        $('.datatables-products').on('click', '.delete-btn', function () {
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
                        url: "products/" + id,
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

        //reload dataTable user
        function reloadDataTable() {
            dt_products.ajax.reload();
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

        //go to add page
        $('.add-btn').click(function (e) {
            e.preventDefault();
            window.location.href = '/admin/products/create';
        });

        //go to add page
        $('.trash-btn').click(function (e) {
            e.preventDefault();
            window.location.href = '/admin/products/trash';
        });

        //go to edit page
        $('.datatables-products').on('click', '.edit-btn', function(){
            var id = $(this).val();
            window.location.href = `/admin/products/${id}/edit`;
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
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách sản phẩm</h4>

    <!-- Product List Table -->
    <div class="card">
        <!-- <div class="card-header">
            <h5 class="card-title mb-0">Lọc theo:</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 product_category"></div>
                <div class="col-md-4 product_brand"></div>
                <div class="col-md-4 product_status"></div>
            </div>
        </div> -->
        <div class="card-datatable table-responsive">
            <table class="datatables-products table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
