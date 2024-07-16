@extends('layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
<script>
    'use strict';
    const formDataStore = new FormData();
    const formDataUpdate = new FormData();
    const select2ForAddProvince = $('.add-address-province-select2');
    const select2ForAddDistrict = $('.add-address-district-select2');
    const select2ForAddWard = $('.add-address-ward-select2');
    const select2ForAddUsers = $('.add-address-user_id-select2');

    if (select2ForAddProvince.length || select2ForAddDistrict.length || select2ForAddWard.length || select2ForAddUsers.length) {
        select2ForAddProvince.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn Tỉnh, Thành',
                dropdownParent: $this.parent()
            });
        });

        select2ForAddDistrict.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn Quận, Huyện',
                dropdownParent: $this.parent(),
            });
        });

        select2ForAddWard.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn Xã, Phường',
                dropdownParent: $this.parent(),
            });
        });

        select2ForAddUsers.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeHolder: 'Chọn Xã, Phường',
                dropdownParent: $this.parent(),
            });
        });
    }


    // Datatable (jquery)
    $(function () {
        const SUCCESS = 200;
        let borderColor, bodyBg, headingColor;
        // Variable declaration for table
        var dt_address_table = $('.datatables-addresses');

        // Brands datatable
        if (dt_address_table.length) {
            var statusObj = {
                0: { title: 'Chưa thiết lập', class: 'bg-label-secondary' },
                1: { title: 'Đặc làm mặc định', class: 'bg-label-success' },
            };
            var dt_address = dt_address_table.DataTable({
                ajax: { url: '{{route('addresses.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'full_name', render: function (data, type, full, meta) {
                            var $name = full['full_name'];

                            var $row_output =
                                '<div class="d-flex justify-content-start align-items-center user-name">' +
                                '<div class="d-flex flex-column">' +
                                '<a href="" class="text-body text-truncate"><span class="fw-medium">' +
                                $name +
                                '</span></a>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    { data: 'phone', name: 'phone' },
                    { data: 'address_detail', name: 'address_detail' },
                    { data: 'ward', name: 'ward' },
                    { data: 'district', name: 'district' },
                    { data: 'provinces', name: 'provinces' },
                    {
                        data: 'is_default', render: function (data, type, full, meta) {
                            var is_default = full['is_default'];
                            return '<span class="badge px-2 ' +
                                statusObj[is_default].class +
                                '" text-capitalized>' +
                                statusObj[is_default].title +
                                '</span>'
                        }
                    },
                    {
                        data: 'id', render: function (data, type, full, meta) {
                            return (
                                '<div class="d-flex align-items-center">' +
                                '<button value="' + full['id'] + '" class="btn btn-sm btn-icon delete-btn"><i class="ti ti-trash ti-sm mx-2"></i></button>' +
                                '</div>'
                            );
                        }
                    }
                ],
                order: [[1, 'desc']],
                dom:
                    '<"row me-2"' +
                    '<"col-md-2"<"me-3"l>>' +
                    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
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
                        extend: 'collection',
                        className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
                        text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Xuất',
                        buttons: [
                            {
                                extend: 'print',
                                text: '<i class="ti ti-printer me-2" ></i>Print',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                    // prevent avatar to be print
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
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
                                    //customize print view for dark
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
                                text: '<i class="ti ti-file-text me-2" ></i>Csv',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
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
                                text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
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
                                text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
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
                                text: '<i class="ti ti-copy me-2" ></i>Copy',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('user-name')) {
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
                        text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Thêm mới</span>',
                        className: 'add-new btn btn-primary waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'offcanvas',
                            'data-bs-target': '#offcanvasAddUser'
                        }
                    }
                ],
                // For responsive popup
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                return 'Thông tin chi tiết';
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
            });
        }

        $('#add-address-provinces').change(function () {
            const provinceId = $(this).val();
            $('#add-address-districts').prop('disabled', true).empty().append('<option value="">Chọn Quận/Huyện</option>');;
            $('#add-address-wards').prop('disabled', true).empty().append('<option value="">Chọn Xã/Phường</option>');

            if (provinceId) {
                $.ajax({
                    url: `/api/provinces/${provinceId}/districts`, // Đường dẫn API để lấy dữ liệu quận/huyện
                    method: 'GET',
                    success: function (response) {
                        if (response.status) {
                            $('#add-address-districts').append(response.data.map(district =>
                                `<option value="${district.id}">${district.name}</option>`
                            ));
                        }
                        $('#add-address-districts').prop('disabled', false);

                    }
                });
            }
        });

        $('#add-address-districts').change(function () {
            const districtId = $(this).val();
            $('#add-address-wards').prop('disabled', true).empty().append('<option value="">Chọn Xã/Phường</option>');

            if (districtId) {
                $.ajax({
                    url: `/api/districts/${districtId}/wards`,
                    method: 'GET',
                    success: function (response) {
                        if (response.status) {
                            $('#add-address-wards').append(response.data.map(ward =>
                                `<option value="${ward.id}">${ward.name}</option>`
                            ));
                        }
                        $('#add-address-wards').prop('disabled', false);

                    }
                });
            }
        });

        $('#edit-address-provinces').change(function () {
            const provinceId = $(this).val();
            $('#edit-address-districts').prop('disabled', true).empty().append('<option value="">Chọn Quận/Huyện</option>');;
            $('#edit-address-wards').prop('disabled', true).empty().append('<option value="">Chọn Xã/Phường</option>');

            if (provinceId) {
                $.ajax({
                    url: `/api/provinces/${provinceId}/districts`, // Đường dẫn API để lấy dữ liệu quận/huyện
                    method: 'GET',
                    success: function (response) {
                        if (response.status) {
                            $('#edit-address-districts').append(response.data.map(district =>
                                `<option value="${district.id}">${district.name}</option>`
                            ));
                        }
                        $('#edit-address-districts').prop('disabled', false);
                    }
                });
            }
        });

        $('#edit-address-districts').change(function () {
            const districtId = $(this).val();
            $('#edit-address-wards').prop('disabled', true).empty().append('<option value="">Chọn Xã/Phường</option>');

            if (districtId) {
                $.ajax({
                    url: `/api/districts/${districtId}/wards`,
                    method: 'GET',
                    success: function (response) {
                        if (response.status) {
                            $('#edit-address-wards').append(response.data.map(ward =>
                                `<option value="${ward.id}">${ward.name}</option>`
                            ));
                        }
                        $('#edit-address-wards').prop('disabled', false);
                    }
                });
            }
        });

        //add new address
        $('#add-btn').click(function (e) {
            e.preventDefault();

            let full_name = $('#add-address-full_name').val();
            let phone = $('#add-address-phone').val();
            let district = $('#add-address-districts option:selected').text();
            let provinces = $('#add-address-provinces option:selected').text();
            let ward = $('#add-address-wards option:selected').text()
            let is_default = $('#add-address-is_default').is(':checked') ? 1 : 0;
            let address_detail = $('#add-address-address_detail').val();
            let user_id = $('#add-address-user_id option:selected').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("full_name", full_name);
            formDataStore.append("phone", phone);
            formDataStore.append("district", district);
            formDataStore.append("provinces", provinces);
            formDataStore.append("ward", ward);
            formDataStore.append("is_default", is_default);
            formDataStore.append("address_detail", address_detail);
            formDataStore.append("user_id", user_id);

            $.ajax({
                url: "{{route('addresses.store')}}",
                method: "post",
                data: formDataStore,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message)
                    reloadDataTable();
                    closeOffCanvas();
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#add-new-address-form', '.add-address-');
            });
        });

        //delete address
        $('.datatables-addresses').on('click', '.delete-btn', function () {
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
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "addresses/" + id,
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

        //close offcanvas add-brand
        function closeOffCanvas() {
            $('.close-offcanvas').click();
        }

        //reload dataTable user
        function reloadDataTable() {
            dt_address.ajax.reload();
        }

        //Notification if request successfully
        function successfulNotification(message) {
            Swal.fire({
                icon: 'success',
                title: 'Đã xóa thành công!',
                text: 'Địa chỉ đã được cập nhật.',
                customClass: {
                    confirmButton: 'btn btn-success waves-effect waves-light'
                }
            });
        }

        //show errors
        function showValidationErrors(errors, formClass, errorClass) {
            $(formClass).addClass('was-validated');
            $.each(errors, function (key, value) {
                $(errorClass + key + '-error').text(value[0]);
                $(errorClass + key + '-error').text(value[1]);
                $(errorClass + key + '-error').text(value[2]);
                $(errorClass + key + '-error').text(value[3]);
                $(errorClass + key + '-error').text(value[4]);
                $(errorClass + key + '-error').text(value[5]);
            });
        }

        //For get url add-image
        $('#add-address-phone').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataStore.set("logo", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //For get url edit-image
        $('#edit-brand-logo').change(function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    formDataUpdate.set("logo", input.files[0]);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        //Clear inputFile after store or update
        function clearInputFile(f) {
            if (f.value) {
                try {
                    f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
                } catch (err) { }
                if (f.value) { //for IE5 ~ IE10
                    var form = document.createElement('form'),
                        parentNode = f.parentNode, ref = f.nextSibling;
                    form.appendChild(f);
                    form.reset();
                    parentNode.insertBefore(f, ref);
                }
            }
        }

        //Clear form create after hiden form
        $('#offcanvasAddUser').on('hidden.bs.offcanvas', function () {
            $('#add-address-full_name').val('');


            $('.add-address-full_name-error').text('');

        });

        //Clear form edit after hiden form
        $('#offcanvasEditUser').on('hidden.bs.offcanvas', function () {
            $('#edit-brand-logo').click(function () { clearInputFile($(this).val()); });
            $('.edit-address-full_name-error').text('');

            $('.edit-address-full_name-error').text('');
            $('.edit-brand-logo-error').text('');
        });

        // Filter form control to default size
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Sổ địa chỉ</h4>
    <!-- Suppliers List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-addresses table">
                <thead class="border-top">
                    <tr>
                        <th>Tên</th>
                        <th>SĐT</th>
                        <th>Chi tiết</th>
                        <th>Phường</th>
                        <th>Huyện</th>
                        <th>Tỉnh</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new supplier -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Thêm Địa chỉ</h5>
                <button type="button" class="close-offcanvas btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <form class="add-new-address-form pt-0" id="editUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-address-full_name">Họ tên<span style="color: red">
                                *</span></label>
                        <input type="text" class="form-control" id="add-address-full_name" placeholder="Họ tên"
                            name="add-address-full_name" />
                        <div class="text-danger add-address-full_name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-address-phone">Liên hệ</label>
                        <input type="text" class="form-control" id="add-address-phone" placeholder="0 123 456 789" />
                        <div class="text-danger add-address-phone-error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="add-address-provinces">Chọn Tỉnh, Thành phố</label>
                        <select id="add-address-provinces" class="add-address-province-select2 form-select">
                            <option disabled selected value="0">Chọn Tỉnh, Thành phố</option>
                            @foreach ($provinces as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger add-address-provinces-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-address-districts">Chọn Quận, Huyện</label>
                        <select id="add-address-districts" class="add-address-district-select2 form-select">

                        </select>
                        <div class="text-danger add-address-district-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-address-wards">Chọn Xã, Phường</label>
                        <select id="add-address-wards" class="add-address-ward-select2 form-select">

                        </select>
                        <div class="text-danger add-address-ward-error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="add-address-phone">Thông tin chi tiết</label>
                        <input type="text" class="form-control" id="add-address-address_detail"
                            placeholder="Vui nhập thông tin chi tiết(tên đường, số nhà...)" />
                        <div class="text-danger add-address-address_detail-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-address-user_id">Người dùng</label>
                        <select id="add-address-user_id" class="add-address-user_id-select2 form-select">
                            <option disabled selected value="0">Chọn Người dùng</option>
                            @foreach ($users as $value)
                                <option value="{{$value->id}}">{{$value->full_name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger add-address-user_id-error"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check m-0">
                                <input type="checkbox" id="add-address-is_default" class="form-check-input">
                                <span class="form-check-label">Đặt làm địa chỉ mặc
                                    định</span>
                            </label>

                        </div>
                        <div class="text-danger add-address-is_default-error"></div>
                    </div>
                    <button type="submit" id="add-btn" class="btn btn-primary me-sm-3 me-1 data-submit">Lưu</button>
                    <button type="reset" class="btn btn-label-secondary close-offcanvas"
                        data-bs-dismiss="offcanvas">Hủy</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
