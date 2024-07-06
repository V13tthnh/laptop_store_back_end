@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
<script>
    'use strict';
    const couponAddStartDate = document.querySelector('#store-start_date');
    const couponAddEndDate = document.querySelector('#store-end_date');
    const couponUpdateStartDate = document.querySelector('#update-start_date');
    const couponUpdateEndDate = document.querySelector('#update-end_date');

    if (couponAddStartDate || couponAddEndDate) {
        couponAddStartDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
        couponAddEndDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
    }

    if (couponUpdateStartDate || couponUpdateEndDate) {
        couponUpdateStartDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
        couponUpdateEndDate.flatpickr({
            dateFormat: 'd-m-Y'
        });
    }
    //Use Quill text editor for Description
    const storeCommentEditor = document.querySelector('.store-comment-editor');
    if (storeCommentEditor) {
        var quillStore = new Quill(storeCommentEditor, {
            modules: {
                toolbar: '.store-comment-toolbar'
            },
            placeholder: 'Vui lòng nhập mô tả...',
            theme: 'snow'
        });
    }

    const updateCommentEditor = document.querySelector('.update-comment-editor');
    if (updateCommentEditor) {
        var quillUpdate = new Quill(updateCommentEditor, {
            modules: {
                toolbar: '.update-comment-toolbar'
            },
            placeholder: 'Vui lòng nhập mô tả...',
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
        var select2Store = $('.select2-store');
        if (select2Store.length) {
            select2Store.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    dropdownParent: $this.parent(),
                    placeholder: $this.data('placeholder') //for dynamic placeholder
                });
            });
        }

        var select2Update = $('.select2-update');
        if (select2Update.length) {
            select2Update.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    dropdownParent: $this.parent(),
                    placeholder: $this.data('placeholder') //for dynamic placeholder
                });
            });
        }

        // Variable declaration for category list table
        var dt_discount_list_table = $('.datatables-category-list');

        if (dt_discount_list_table.length) {
            var dt_discount = dt_discount_list_table.DataTable({
                ajax: { url: "{{route('coupons.data.table')}}", method: "get", dataType: "json", }, // JSON file to add data
                columns: [
                    // columns according to JSON
                    { data: 'code', name: 'code' },
                    {
                        data: 'type', render: function (data, type, full, meta) {
                            let statusObj = {
                                1: { title: 'Giảm theo %', class: 'bg-label-warning' },
                                2: { title: 'Giảm theo giá tiền', class: 'bg-label-info' },
                                3: { title: 'Giảm giá giao hàng ', class: 'bg-label-success' }
                            };

                            return ('<span class="badge ' +
                                statusObj[data].class +
                                '" text-capitalized>' +
                                statusObj[data].title +
                                '</span>');
                        }
                    },
                    { data: 'description', name: 'description' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'end_date', name: 'end_date' },
                    {
                        data: 'status', render: function (data, type, full, meta) {
                            let statusObj = {
                                1: { title: 'Đang áp dụng', class: 'bg-label-success' },
                                0: { title: 'Không áp dụng', class: 'bg-label-secondary' }
                            };

                            return ('<span class="badge ' +
                                statusObj[data].class +
                                '" text-capitalized>' +
                                statusObj[data].title +
                                '</span>');
                        }
                    },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return '<div class="d-flex align-items-sm-center justify-content-sm-center">' +
                                '<button class="btn btn-sm btn-icon editBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditCoupon"  value=' + data + '><i class="ti ti-edit" ></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-record me-2 deleteBtn" value=' + data + '><i class="ti ti-trash"></i></button>' +
                                '</div>';
                        }
                    }
                ],
                columnDefs: [],

                dom:
                    '<"card-header d-flex flex-wrap pb-2"' +
                    '<f>' +
                    '<"d-flex justify-content-center justify-content-md-end align-items-baseline"<"dt-action-buttons d-flex justify-content-center flex-md-row mb-3 mb-md-0 ps-1 ms-1 align-items-baseline"lB>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                lengthMenu: [7, 10, 20, 50, 70, 100], //for length of menu
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
                // Buttons
                buttons: [
                    {
                        text: '<i class="ti ti-plus ti-xs me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Thêm mới</span>',
                        className: 'add-new btn btn-primary ms-2 waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'offcanvas',
                            'data-bs-target': '#offcanvasAddCoupon'
                        }
                    },
                ],
                // For responsive popup
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return 'Mô tả ' + data['name'];
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
                                    '<td> ' +
                                    col.title +
                                    ':' +
                                    '</td> ' +
                                    '<td class="ps-0">' +
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
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('me-3 ps-0');
        } else {
            return '<tbody><td>Có lỗi xảy ra trong quá trình lấy dữ liệu!</td></tbody>'
        }

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);

        //Initialization FormData to implementing function store & update
        var formDataStore = new FormData();
        var formDataUpdate = new FormData();

        //Clear form create after hiden form
        $('#offcanvasAddCoupon').on('hidden.bs.offcanvas', function () {
            $('#create-form').removeClass('was-validated');
            $('#store-code').val("");
            $('#store-value').val("");
            $('#store-minimum_spend').val("");
            couponAddStartDate.clear();
            couponAddEndDate.clear();
            $('#store-type').val($("#store-parent-category option:first").val());
            quillStore.setContents([{ insert: '\n' }]);
            $(".store-value-error").text("");
            $(".store-code-error").text("");
            $(".store-minimum_spend-error").text("");
        });

        //Clear form update after hiden form
        $('#offcanvasEditCoupon').on('hidden.bs.offcanvas', function () {
            $('#update-form').removeClass('was-validated');
            $("#update-value").val("");
            $('#update-code').val("");
            $('#update-minimun_spend').val("");
            couponAddStartDate.clear();
            couponAddEndDate.clear();
            couponUpdateStartDate.clear();
            couponUpdateEndDate.clear();
            $('#update-type').val($("#update-parent-category option:first").val());
            quillUpdate.setContents([{ insert: '\n' }]);
            $(".update-value-error").text("");
            $(".update-code-error").text("");
            $(".update-minimum_spend-error").text("");
        });

        //For store category
        $('#add-btn').click(function (e) {
            e.preventDefault();

            var code = $('#store-code').val();
            var value = $('#store-value').val();
            var minimum_spend = $('#store-minimum_spend').val();
            var start_date = $('#store-start_date').val();
            var end_date = $('#store-end_date').val();
            var type = $('#store-type option:selected').val();
            var description = $('#store-description').text();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("code", code);
            formDataStore.append("value", value);
            formDataStore.append("minimum_spend", minimum_spend);
            formDataStore.append("start_date", start_date);
            formDataStore.append("end_date", end_date);
            formDataStore.append("type", type);
            formDataStore.append("description", description);

            $.ajax({
                url: "{{route('coupons.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
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
                dt_discount.ajax.reload();
                $('.close-offcanvas').click();
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                console.log(errors);
                $('#create-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.store-' + key + '-error').text(value[0]);
                    $('.store-' + key + '-error').text(value[1]);
                    $('.store-' + key + '-error').text(value[2]);
                    $('.store-' + key + '-error').text(value[3]);
                    $('.store-' + key + '-error').text(value[4]);
                });
            });
        });

        //For edit category
        $('.datatables-category-list').on('click', '.editBtn', function () {
            var id = $(this).val();
            $.ajax({
                url: "coupons/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#update-id').val(res.data.id);
                $('#update-code').val(res.data.code);
                $('#update-value').val(res.data.value);
                $('#update-minimum_spend').val(res.data.minimum_spend);
                $('#update-start_date').val(res.data.start_date);
                $('#update-end_date').val(res.data.end_date);
                $('#update-type').val(res.data.type);
                quillUpdate.setText(res.data.description)
            });
        });

        //For update category
        $('#update-btn').click(function (e) {
            e.preventDefault();
            var id = $('#update-id').val();
            var code = $('#update-code').val();
            var value = $('#update-value').val();
            var minimum_spend = $('#update-minimum_spend').val();
            var start_date = $('#update-start_date').val();
            var end_date = $('#update-end_date').val();
            var type = $('#update-type option:selected').val();
            var description = $('#update-description').text();

            formDataUpdate.append("_token", "{{ csrf_token() }}");
            formDataUpdate.append("code", code);
            formDataUpdate.append("value", value);
            formDataUpdate.append("minimum_spend", minimum_spend);
            formDataUpdate.append("start_date", start_date);
            formDataUpdate.append("end_date", end_date);
            formDataUpdate.append("type", type);
            formDataUpdate.append("description", description);

            $.ajax({
                url: 'coupons/' + id + '/update',
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
                    reloadDataTable();
                    closeOffCanvas();
                    clearUpdateForm();
                } else {
                    return;
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                console.log(errors);
                $('#update-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.update-' + key + '-error').text(value[0]);
                    $('.update-' + key + '-error').text(value[1]);
                    $('.update-' + key + '-error').text(value[2]);
                    $('.update-' + key + '-error').text(value[3]);
                    $('.update-' + key + '-error').text(value[4]);
                });
            });
        });

        //For delete category
        $('.datatables-category-list').on('click', '.deleteBtn', function () {
            var id = $(this).val();
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Dữ liệu sẽ không thể khôi phục sau khi xóa!",
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
                        url: "coupons/" + id,
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
                            reloadDataTable()
                        }
                    });
                }
            });
        });


        //close offcanvas add-user
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_discount.ajax.reload();
        }
    });
</script>
@endsection



@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Trang chủ /</span> Danh sách mã giảm giá</h4>
    <div class="app-ecommerce-category">
        <!-- Category List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-category-list table border-top">
                    <thead>
                        <tr>
                            <th>CODE</th>
                            <th>Loại</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th class="text-lg-center">Thao tác</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

        <!-- Offcanvas to add new category -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCoupon"
            aria-labelledby="offcanvasAddCoupon">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasAddCoupon" class="offcanvas-title">Thêm mới</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset close-offcanvas"
                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form class="pt-0" id="create-form">
                    <div class="mb-3">
                        <div class="small" style="color: red">Bắt buộc*</div>
                    </div>
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label" for="store-code">Mã giảm giá<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="store-code" placeholder="Vui lòng nhập mã giảm"
                            aria-label="category title" required />
                        <div class="text-danger store-code-error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="store-value">Giá trị<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="store-value" placeholder="Vui lòng nhập Giá trị"
                            aria-label="category title" required />
                        <div class="text-danger store-value-error"></div>
                    </div>

                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="store-minimum_spend">Chi phí tối thiểu</label>
                        <input type="text" class="form-control" id="store-minimum_spend"
                            placeholder="Vui lòng nhập chi phí tối thiểu" aria-label="category title" required />
                        <div class="text-danger store-minimum_spend-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="update-start_date" class="form-label">Ngày bắt đầu<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYY" id="store-start_date" />
                        <div class="text-danger edit-start_date-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="update-end_date" class="form-label">Ngày kết thúc<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYY" id="store-end_date" />
                        <div class="text-danger edit-end_date-error"></div>
                    </div>


                    <div class="mb-3">

                        <label for="update-end_date" class="form-label">Loại giảm giá<span style="color: red">
                                *</span></label>

                        <select name="form-select" class="form-select" id="store-type">
                            <option value="1" selected>Phần trăm đơn hàng(%)</option>
                            <option value="2">Giảm giá tiền</option>
                            <option value="3">Giao hàng</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <div class="form-control p-0 py-1">
                            <div class="store-comment-editor border-0" id="store-description"></div>
                            <div class="store-comment-toolbar border-0">
                                <div class="d-flex justify-content-end">
                                    <span class="ql-formats me-0">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                            id="add-btn">Thêm</button>
                        <button type="reset" class="btn bg-label-danger close-offcanvas"
                            data-bs-dismiss="offcanvas">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Offcanvas to edit category -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditCoupon"
            aria-labelledby="offcanvasEditCoupon">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEditCoupon" class="offcanvas-title">Cập nhật</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset close-offcanvas"
                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form class="pt-0" id="update-form">
                    <div class="mb-3">
                        <div class="small" style="color: red">Bắt buộc*</div>
                    </div>
                    <input type="text" class="form-control" placeholder="DD-MM-YYY" id="update-id" hidden />
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label" for="update-code">Mã giảm giá<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" id="update-code" placeholder="Vui lòng nhập mã giảm giá"
                            aria-label="category title" required />
                        <div class="text-danger update-code-error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="update-value">Giá trị<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="update-value" placeholder="Vui lòng nhập giá trị"
                            aria-label="category title" required />
                        <div class="text-danger update-value-error"></div>
                    </div>

                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="update-minimum_spend">Chi phí tối thiểu</label>
                        <input type="text" class="form-control" id="update-minimum_spend"
                            placeholder="Vui lòng nhập chi phí tôi thiểu" aria-label="category title" required />
                        <div class="text-danger update-minimum_spend-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="update-start_date" class="form-label">Ngày bắt đầu<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYY" id="update-start_date" />
                        <div class="text-danger update-start_date-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="update-end_date" class="form-label">Ngày kết thúc<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYY" id="update-end_date" />
                        <div class="text-danger update-end_date-error"></div>
                    </div>

                    <div class="mb-3">

                        <label for="update-end_date" class="form-label">Loại giảm giá<span style="color: red">
                                *</span></label>
                        <select name="form-select" class="form-select" id="update-type">
                            <option value="1" selected>Phần trăm đơn hàng(%)</option>
                            <option value="2">Giảm giá tiền</option>
                            <option value="3">Giao hàng</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <div class="form-control p-0 py-1">
                            <div class="update-comment-editor border-0" id="update-description"></div>
                            <div class="update-comment-toolbar border-0">
                                <div class="d-flex justify-content-end">
                                    <span class="ql-formats me-0">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                            id="update-btn">Lưu</button>
                        <button type="reset" class="btn bg-label-danger close-offcanvas"
                            data-bs-dismiss="offcanvas">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
