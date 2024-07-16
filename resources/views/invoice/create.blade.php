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
    const commentEditor = document.querySelector('.comment-editor');
    const SUCCESS = 200, allValid = true;
    var formData = new FormData();
    var invoices_supplier_id = [],
        invoices_format = [],
        invoices_product_list = [],
        invoices_subtotals = [], invoice_total = 0;

    $('#invoice-table-btn').hide();

    if (commentEditor) {
        new Quill(commentEditor, {
            modules: {
                toolbar: '.comment-toolbar'
            },
            placeholder: 'Enter category description...',
            theme: 'snow'
        });
    }

    // Datatable (jquery)
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

        //select2 for dropdowns in offcanvas
        var select2 = $('.select2');
        if (select2.length) {
            select2.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    dropdownParent: $this.parent(),
                    placeholder: $this.data('placeholder') //for dynamic placeholder
                });
            });
        }

        var dt_product_table = $('.datatables-products');
        if (dt_product_table.length) {
            var dt_products = dt_product_table.DataTable({
                ajax: { url: "{{route('products.data.table')}}", method: "get", dataType: "json", },
                columns: [
                    {
                        data: 'id',
                        checkboxes: {
                            selectAllRender: '<input type="checkbox" class="form-check-input" id="select-all">'
                        },
                        render: function (data, type, full, meta) {
                            return '<input type="checkbox" class="dt-checkboxes form-check-input product-id" value="' + full['id'] + '" name="product_id[]">';
                        },
                    },
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
                ],

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
                buttons: [],
            });
            $('.dataTables_length').addClass('mt-0 mt-md-3 ms-n2');
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('ms-n3');
        }

        var dt_invoice_product_table = $('.datatables-invoice-products');
        if (dt_invoice_product_table.length) {
            var dt_invoices_p = dt_invoice_product_table.DataTable({
                searching: false,
                buttons: [],
                paging: false,
                info: false,
                responsive: true,
                lengthChange: false,
                language: { emptyTable: "<div class='badge bg-label-danger'>Vui lòng thêm sản phẩm</div>", }
            });
        }

        //add product to invoice
        $('#add-product-btn').click(function () {
            let product_ids = [];

            $('.product-id:checked').each(function () {
                product_ids.push($(this).val());
            });

            if (product_ids.length === 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: "Vui lòng chọn sản phẩm",
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
                return;
            }

            $.ajax({
                url: '{{ route("invoices.add-to-invoice") }}',
                type: 'POST',
                data: {
                    product_ids: product_ids,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success === SUCCESS) {
                        $('#invoice-table-btn').show();
                        var selectedProducts = [];

                        response.data.forEach(function (product) {
                            var exists = false;

                            dt_invoices_p.rows().every(function () {
                                var $row = $(this.node());

                                if (parseInt($row.find('.invoices_p_ids').val()) === product.id) {
                                    var newQuantity = parseInt($row.find('.invoices_p_quantities').val()) + 1;
                                    $row.find('.invoices_p_quantities').val(newQuantity);
                                    exists = true;
                                }
                            });

                            var $name = product.name,
                                $image = product.images[0]?.url;
                            var truncatedName = $name.length > 50 ? $name.substring(0, 50) + '...' : $name;
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="/' + $image + '" alt="Avatar" class="" >';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6);
                                var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $name = product.name,
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
                                truncatedName +
                                '</span></a>' +
                                '</div>' +
                                '</div>';

                            if (!exists) {
                                dt_invoices_p.row.add([
                                    '<input type="checkbox" class="dt-checkboxes form-check-input invoices_p_ids" value="' + product.id + '" name="invoices_p_ids[]">',
                                    $row_output,
                                    '<input class="form-control invoices_p_quantities" min="1" type="number" value="1" name="invoices_p_quantities[]">',

                                    '<input class="form-control invoices_p_cost_prices" min="1" type="number" name="invoices_p_cost_prices[]">',

                                    '<span class="invoices_p_totals"></span>'

                                ]).draw(false);
                            }
                        });
                    }

                    $('.datatables-products input.product-id:checked').each(function () {
                        $('.product-id').prop('checked', false);
                        $('#select-all').prop('checked', false);
                    });
                }
            });
        });

        $('#add-btn').click(function () {
            if (invoice_total <= 0) {
                warningNotification("Vui lòng cập nhật danh sách sản phẩm nhập trước khi lưu.");
                return;
            }

            let supplier_id = $('#invoices_p_supplier').val();
            let formality = $('#invoice_p_formality').val();
            let profit = parseFloat($('#invoice_p_profit').val()) / 100;

            formData.append('_token', "{{csrf_token()}}");
            formData.append('supplier_id', supplier_id);
            formData.append('formality', formality);
            formData.append('profit', profit);

            formData.delete('product_id[]');
            formData.delete('quantity[]');
            formData.delete('cost_price[]');
            formData.delete('total[]');
            dt_invoices_p.rows().every(function () {
                var $row = $(this.node());
                let product_id = $row.find('.invoices_p_ids').val();
                var quantity = $row.find('.invoice_p_quantities').val();
                var cost_price = $row.find('.invoice_p_cost_prices').val();
                var total = $row.find('.invoices_p_totals').val();

                formData.append('product_id[]', product_id);
                formData.append('quantity[]', quantity);
                formData.append('cost_price[]', cost_price);
                formData.append('total[]', total);
            });

            $.ajax({
                url: "{{route('invoices.store')}}",
                method: "post",
                data: formData,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success) {
                    deleteAll();
                    successNotification("Xóa thành công");
                    $('#select-all-invoice-products').prop('checked', false);
                    successNotification("Thêm hóa đơn thành công");
                    window.location.href = '/admin/invoices';
                }
            }).fail(function (res) {
                console.log(res.responseJSON.errors);
                $.each(res.responseJSON.errors, function (key, value) {
                    $('.add-invoice-' + key + '-error').text(value[0]);
                    $('.add-invoice-' + key + '-error').text(value[1]);
                    $('.add-invoice-' + key + '-error').text(value[2]);
                    $('.add-invoice-' + key + '-error').text(value[3]);
                    $('.add-invoice-' + key + '-error').text(value[4]);
                });
            });
        });

        //select all invoice products
        $('#select-all-invoice-products').on('click', function () {
            if ($(this).prop('checked')) {
                $('.datatables-invoice-products input.invoices_p_ids').prop('checked', true);
            } else {
                $('.datatables-invoice-products input.invoices_p_ids').prop('checked', false);
            }
        });

        //Update product was added to invoice
        $('#update-p-invoice-btn').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Những thay đổi từ trước đó sẽ không thể cập nhật lại',
                text: 'Hãy kiểm tra cẩn thận dữ liệu 1 lần nữa trước khi lưu',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Lưu thông tin',
                cancelButtonText: 'Hủy',
                customClass: {
                    confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    dt_invoices_p.rows().every(function () {
                        var rowData = this.data();
                        var $row = $(this.node());

                        var costPrice = $row.find('.invoices_p_cost_prices').val();
                        var quantity = $row.find('.invoices_p_quantities').val();

                        $row.find('.invoices_p_cost_prices').replaceWith('<span>' + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(costPrice) + '</span>' + '<input class="form-control invoice_p_cost_prices" type="number" value="' + costPrice + '" hidden>');
                        $row.find('.invoices_p_quantities').replaceWith('<span>' + quantity + '</span>' + '<input class="form-control invoice_p_quantities" type="number" value="' + quantity + '" hidden>');
                    });
                    invoice_total = calculateTotalSum();
                    $('#total').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(calculateTotalSum()));
                    $('#subtotal').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(calculateTotalSum()));
                    successNotification("Cập nhật thành công");
                }
            })
        });

        //Delete product in invoice
        $('#delete-p-invoice-btn').click(function (e) {
            e.preventDefault();
            if (checkAllCheckbox()) {
                warningNotification("Vui lòng chọn sản phẩm cần xóa");
                return;
            }

            if ($('#select-all-invoice-products').prop('checked')) {
                deleteAll();
                successNotification("Xóa thành công");
                $('#select-all-invoice-products').prop('checked', false);
            } else {
                deleteSelectedCheckbox();
                successNotification("Xóa thành công");
            };
        });

        $('#invoice_p_formality').on('select2:select', function (e) {
            var selectedText = e.params.data.text;
            $('#invoice_p_formality_text').text(selectedText);
        });

        $('#invoices_p_supplier').on('select2:select', function (e) {
            var selectedText = e.params.data.text;
            $('#invoices_p_supplier_text').text(selectedText);
        });

        function checkAllCheckbox() {
            let allUnChecked = true;

            $('.datatables-invoice-products input.invoices_p_ids').each(function () {
                if ($(this).prop('checked')) {
                    allUnChecked = false;
                }
            });

            return allUnChecked;
        }

        function deleteSelectedCheckbox() {
            var rowsToDelete = [];

            $('.datatables-invoice-products input.invoices_p_ids').each(function (product) {
                if ($(this).prop('checked')) {
                    rowsToDelete.push($(this).closest('tr'));
                }
            });

            rowsToDelete.forEach(function (row) {
                dt_invoices_p.row(row).remove().draw(false);
            });
        }

        function deleteAll() {
            dt_invoices_p.clear().draw();
        }

        // auto update total
        $('.datatables-invoice-products').on('change', '.invoices_p_cost_prices, .invoices_p_quantities', function () {
            var tr = $(this).closest('tr');
            var cost_price = parseFloat(tr.find('.invoices_p_cost_prices').val());
            var quantity = parseFloat(tr.find('.invoices_p_quantities').val());
            var total = cost_price * quantity;
            tr.find('.invoices_p_totals').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total));
            tr.find('.invoices_p_totals').val(total);
        });

        $('.datatables-invoice-products').on('input', '.invoices_p_quantities, .invoices_p_cost_prices', function () {
            let inputValue = $(this).val().trim();

            inputValue = inputValue.replace(/[^\d.]/g, '');

            if (/^\d*\.?\d*$/.test(inputValue) && !inputValue.includes('-')) {
                $(this).val(inputValue);
            } else {
                $(this).val('');
            }
        });

        $('#invoice_p_profit').on('input', function () {
            let inputValue = $(this).val().trim();

            // Loại bỏ các ký tự không phải số
            inputValue = inputValue.replace(/[^\d]/g, '');

            // Kiểm tra và cập nhật lại giá trị vào input
            $(this).val(inputValue);
        });

        function calculateTotalSum() {
            var totalSum = 0;
            dt_invoices_p.rows().every(function () {
                var $row = $(this.node());
                var total = parseInt($row.find('.invoices_p_totals').val());
                totalSum += total;
            });
            return totalSum;
        }

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

        function warningNotification(message) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
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
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">Trang chủ /</span><span class="fw-medium"> Nhập hàng</span>
    </h4>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="app-ecommerce">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex align-content-center flex-wrap gap-3">
                <button type="submit" class="btn btn-primary" id="add-btn">Lưu</button>
                <div class="d-flex gap-3">
                    <a href="{{route('invoices.index')}}" class="btn btn-label-danger">Hủy</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-5">
                <form id="add-invoice-form">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Thông tin đơn nhập</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                    for="ecommerce-product-name">Nhà cung cấp<span style="color: red">
                                        *</span>
                                    <a href="{{route('suppliers.index')}}" class="fw-medium">Thêm nhà cung
                                        cấp</a></label>
                                <select id="invoices_p_supplier" class="select2 form-select"
                                    data-placeholder="Chọn nhà cung cấp">
                                    <option value="0" disabled selected>Chọn nhà cung cấp</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}"><img src="/{{$supplier->logo}}" alt="Avatar"
                                                class="rounded-circle">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger add-invoice-supplier_id-error"></div>
                            </div>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Mức lợi nhuận mong muốn:</label>
                                <input type="number" class="form-control" id="invoice_p_profit"
                                    placeholder="Nhập % mức lợi nhuận mong muốn" />
                                <div class="text-danger add-invoice-profit-error"></div>
                            </div>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Hình thức thanh toán </label>
                                <select id="invoice_p_formality" class="select2 form-select"
                                    data-placeholder="Xuất bản">
                                    <option value="1" selected>Tiền mặt</option>
                                    <option value="2">Chuyển khoản</option>
                                    <option value="3">Khác</option>
                                </select>
                                <div class="text-danger add-invoice-formality-error"></div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Thông tin tổng quát</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <table class="table m-0">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="align-top px-4 py-4">
                                                <p class="mb-2 mt-3">
                                                    <span class="ms-3 fw-medium">Nhân viên:</span>
                                                    <span>
                                                        {{auth()->user()->full_name}}
                                                    </span>
                                                </p>
                                                <p class="mb-2 mt-3">
                                                    <span class="ms-3 fw-medium">Nhà cung cấp: </span>
                                                    <span id="invoices_p_supplier_text"></span>
                                                </p>
                                                <p class="mb-2 mt-3"></p>
                                                <span class="ms-3 fw-medium">Ngày nhập: </span>
                                                <span>{{$currentDate}}</span>
                                                </p>
                                                <p class="mb-2 mt-3"></p>
                                                <span class="ms-3 fw-medium">Hình thức: </span>
                                                <span id="invoice_p_formality_text">Tiền mặt</span>
                                                </p>
                                            </td>
                                            <td class="text-end pe-3 py-4">
                                                <p class="mb-2 pt-3">Tổng tiền hàng:</p>
                                                <p class="mb-2">Chiết khấu:</p>
                                                <p class="mb-2">Thuế:</p>
                                                <p class="mb-0 pb-3"><strong>Tổng tiền:</strong></p>
                                            </td>
                                            <td class="ps-2 py-4">
                                                <p class="fw-medium mb-2 pt-3" id="subtotal">0đ</p>
                                                <p class="fw-medium mb-2">0đ</p>
                                                <p class="fw-medium mb-2">0đ</p>
                                                <p class="fw-medium mb-0 pb-3" id="total"><strong>0đ</strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-12 col-lg-7">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm</h5>
                        <button class="btn btn-primary mt-4" id="add-product-btn"><i
                                class="menu-icon tf-icons ti ti-circle-arrow-left"></i>Thêm vào đơn hàng</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 col">
                            <div class="card-datatable table-responsive">
                                <table class="datatables-products table">
                                    <thead class="border-top">
                                        <tr>
                                            <th></th>
                                            <th>Sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 col">
                            <div class="card-datatable table-responsive">
                                <div id="invoice-table-btn">
                                    <button class="btn btn-outline-primary mb-3" id="update-p-invoice-btn">Cập
                                        nhật</button>
                                    <button class="btn btn-outline-danger mb-3 ml-2"
                                        id="delete-p-invoice-btn">Xóa</button>
                                </div>
                                <table class="datatables-invoice-products table">
                                    <thead class="border-top">
                                        <tr>
                                            <th><input type="checkbox" class="form-check-input"
                                                    id="select-all-invoice-products"></th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá nhập</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
