@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
<script>
    'use strict';
    const commentEditor = document.querySelector('.comment-editor');
    const SUCCESS = 200, allValid = true;
    var formData = new FormData();
    var invoices_supplier_id = [],
        invoices_format = [],
        invoices_product_list = [],
        invoices_subtotals = [], invoice_total = 0;

    let editorInstance;
    ClassicEditor
        .create(document.querySelector('#add-product-description'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    const addStartDate = document.querySelector('#add-start-date');
    const addEndDate = document.querySelector('#add-end-date');

    if (addStartDate || addEndDate) {
        addStartDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
        addEndDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
    }
    $('#sale-table-btn').hide();

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
                // Buttons with Dropdown
                buttons: [],
            });
            $('.dataTables_length').addClass('mt-0 mt-md-3 ms-n2');
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('ms-n3');
        }

        var dt_invoice_product_table = $('.datatables-sale-products');
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
                        $('#sale-table-btn').show();
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
                                $name +
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
                warningNotification("Vui lòng bấm cập nhật để lưu sản phẩm");
                return;
            }
            let supplier_id = $('#invoices_p_supplier').val();
            let formality = $('#invoice_p_formality').val();
            let profit = parseFloat($('#invoice_p_profit').val()) / 100;

            formData.append('_token', "{{csrf_token()}}");
            formData.append('supplier_id', supplier_id);
            formData.append('formality', formality);
            formData.append('profit', profit);

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
                $('.datatables-sale-products input.invoices_p_ids').prop('checked', true);
            } else {
                $('.datatables-sale-products input.invoices_p_ids').prop('checked', false);
            }
        });

        //Update product was added to invoice
        $('#update-p-invoice-btn').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Lưu ý: Những thay đổi từ trước đó sẽ không thể cập nhật lại',
                text: 'Hãy kiểm tra cẩn thận dữ liệu 1 lần nữa trước khi lưu',
                icon: 'warning',
                confirmButtonText: 'Lưu thông tin',
                cancelButtonText: 'Hủy bỏ'
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

            $('.datatables-sale-products input.invoices_p_ids').each(function () {
                if ($(this).prop('checked')) {
                    allUnChecked = false;
                }
            });

            return allUnChecked;
        }

        function deleteSelectedCheckbox() {
            var rowsToDelete = [];

            $('.datatables-sale-products input.invoices_p_ids').each(function (product) {
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
        $('.datatables-sale-products').on('change', '.invoices_p_cost_prices, .invoices_p_quantities', function () {
            var tr = $(this).closest('tr');
            var cost_price = parseFloat(tr.find('.invoices_p_cost_prices').val());
            var quantity = parseFloat(tr.find('.invoices_p_quantities').val());
            var total = cost_price * quantity;
            tr.find('.invoices_p_totals').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total));
            tr.find('.invoices_p_totals').val(total);
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
            <div class="col-12 col-lg-6">
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

                                </select>
                                <div class="text-danger add-invoice-supplier_id-error"></div>
                            </div>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Phần trăm giảm giá</label>
                                <input type="number" class="form-control" id="invoice_p_profit"
                                    placeholder="Nhập % giảm giá" />
                                <div class="text-danger add-invoice-profit-error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="edit-user-birthday" class="form-label">Ngày bắt đầu<span style="color: red">
                                        *</span></label>
                                <input type="text" class="form-control" placeholder="DD-MM-YYY"
                                    id="add-start-date" />
                                <div class="text-danger edit-user-birthday-error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="edit-user-birthday" class="form-label">Ngày kết thúc<span
                                        style="color: red">
                                        *</span></label>
                                <input type="text" class="form-control" placeholder="DD-MM-YYY"
                                    id="add-end-date" />
                                <div class="text-danger edit-user-birthday-error"></div>
                            </div>
                            <div class="mb-3 col- ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Mô tả</label>
                                <textarea id="add-product-description"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 col">
                                <div class="card-datatable table-responsive">
                                    <div id="sale-table-btn">
                                        <button class="btn btn-outline-primary mb-3" id="update-p-invoice-btn">Cập
                                            nhật</button>
                                        <button class="btn btn-outline-danger mb-3 ml-2"
                                            id="delete-p-invoice-btn">Xóa</button>
                                    </div>
                                    <table class="datatables-sale-products table">
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
                </form>
            </div>


            <div class="col-12 col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm</h5>
                        <button class="btn btn-primary mt-4" id="add-product-btn"><i
                                class="menu-icon tf-icons ti ti-circle-arrow-left"></i>Thêm vào chương trình</button>
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


        </div>
    </div>
    @endsection
