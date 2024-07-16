@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
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
<script>
    'use strict';
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

        // Variable declaration for category list table
        var dt_category_list_table = $('.datatables-category-list');

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

        // Categories List Datatable
        var dt_category;
        if (dt_category_list_table.length) {
            dt_category = dt_category_list_table.DataTable({
                ajax: { url: "{{route('categories.data.table')}}", method: "get", dataType: "json", }, // JSON file to add data
                columns: [
                    // columns according to JSON
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'id', name: 'id' }
                ],
                columnDefs: [
                    {
                        // For Responsive
                        className: 'control',
                        searchable: false,
                        orderable: false,
                        responsivePriority: 1,
                        targets: 0,
                        render: function (data, type, full, meta) {
                            return '';
                        }
                    },
                    {
                        // Name and Description
                        targets: 1,
                        responsivePriority: 4,
                        render: function (data, type, full, meta) {
                            var $name = full['name'];
                            return $name;
                        }
                    },

                    {
                        // Name and Description
                        render: function (data, type, full, meta) {
                            var $name = full['description'];
                            return $name;
                        }
                    },
                    {
                        // Name and Description
                        render: function (data, type, full, meta) {
                            var $created_at = full['created_at'];
                            return $created_at;
                        }
                    },
                    {
                        // Actions
                        targets: -1,
                        title: 'Thao tác',
                        searchable: false,
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return '<div class="d-flex align-items-sm-center justify-content-sm-center">' +
                                '<button class="btn btn-sm btn-icon editBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceUpdateCategoryList"  value=' + data + '><i class="ti ti-edit" ></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-record me-2 deleteBtn" value=' + data + '><i class="ti ti-trash"></i></button>' +
                                '</div>';
                        }
                    }
                ],
                order: [[1, 'desc']],
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
                            'data-bs-target': '#offcanvasEcommerceCategoryList'
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

        //Check slug for store
        $('#store-name').change(function () {
            $.ajax({
                url: '{{route('categories.check-slug')}}',
                method: 'get',
                data: {
                    'name': $(this).val()
                }
            }).done(function (res) {
                if (res.success == 200) {
                    $('#store-slug').val(res.slug);
                } else {
                    return;
                }
            });
        });

        //Check slug for update
        $('#update-name').change(function () {
            $.ajax({
                url: '{{route('categories.check-slug')}}',
                method: 'get',
                data: {
                    'name': $(this).val()
                }
            }).done(function (res) {
                if (res.success == 200) {
                    $('#update-slug').val(res.slug);
                } else {
                    return;
                }
            });
        });


        //Clear form create after hiden form
        $('#offcanvasEcommerceCategoryList').on('hidden.bs.offcanvas', function () {
            //clear create form
            $('#create-form').removeClass('was-validated');
            $('.store-name-error').text('');
            $('.store-slug-error').text('');
            $("#store-name").val("");
            $("#store-description").val("");
            $("#store-slug").val("");
            $("#store-parent-category").val($("#store-parent-category option:first").val());
            $("#store-parent-category").trigger('change');
            quillStore.setContents([{ insert: '\n' }]);
        });

        //Clear form update after hiden form
        $('#offcanvasEcommerceCategoryList').on('hidden.bs.offcanvas', function () {
            //clear update form
            $('#update-form').removeClass('was-validated');
            $('.update-name-error').text('');
            $('.update-slug-error').text('');
            $("#update-slug").val("");
            $("#update-name").val("");
            $("#update-description").val("");
            $("#update-parent-category").val($("#update-parent-category option:first").val());
            $("#update-parent-category").trigger('change');
            quillUpdate.setContents([{ insert: '\n' }]);
        });

        //For store category
        $('#add-btn').click(function (e) {
            e.preventDefault();

            var name = $('#store-name').val();
            var parentCategory = $('#store-parent-category').val();
            var description = $('#store-description').text();
            var slug = $('#store-slug').val();

            formDataStore.append("_token", "{{csrf_token()}}");
            formDataStore.append("name", name);
            formDataStore.append("parent_category_id", parentCategory);
            formDataStore.append("description", description);
            formDataStore.append("slug", slug);

            $.ajax({
                url: "{{route('categories.store')}}",
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
                    dt_category.ajax.reload();
                    $('.close-offcanvas').click();

                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                console.log(errors);
                $('#create-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.store-' + key + '-error').text(value[0]);
                    $('.store-' + key + '-error').text(value[1]);
                });
            });
        });

        //For edit category
        $('.datatables-category-list').on('click', '.editBtn', function () {
            var id = $(this).val();
            $.ajax({
                url: "categories/" + id + "/edit",
                method: "get",
            }).done(function (res) {
                if (res.data == null) {
                    Swal.fire({ title: "Dữ liệu không tồn tại", icon: 'error', confirmButtonText: 'OK' });
                    return;
                }
                $('#update-id').val(res.data.id);
                $('#update-slug').val(res.data.slug);
                $('#update-name').val(res.data.name);
                $('#update-parent-category').val(res.data.parent_id !== null ? res.data.parent_id : $("#update-parent-category option:first").val());
                $('#update-parent-category').trigger('change');
                quillUpdate.setText(res.data.description)
            });
        });

        //For update category
        $('#update-btn').click(function (e) {
            e.preventDefault();
            var id = $('#update-id').val();
            var name = $('#update-name').val();
            var description = $('#update-description').text();
            var parentCategory = $('#update-parent-category').val();
            var slug = $('#update-slug').val();

            formDataUpdate.append("_token", "{{csrf_token()}}");
            formDataUpdate.append("name", name);
            formDataUpdate.append("parent_category_id", parentCategory);
            formDataUpdate.append("description", description);
            formDataUpdate.append("slug", slug);

            $.ajax({
                url: 'categories/' + id + '/update',
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
                    dt_category.ajax.reload();
                    $('.close-offcanvas').click();
                    clearUpdateForm();
                } else {
                    return;
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                console.log(errors);
                $('#create-form').addClass('was-validated');
                $.each(errors, function (key, value) {
                    $('.update-' + key + '-error').text(value[0]);
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
                        url: "categories/" + id + "/destroy",
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
                            dt_category.ajax.reload(); //ref   resh bảng
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

    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Trang chủ /</span> Danh mục sản phẩm</h4>
    <div class="app-ecommerce-category">
        <!-- Category List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-category-list table border-top">
                    <thead>
                        <tr>
                            <th></th>

                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th class="text-lg-center">Thao tác</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

        <!-- Offcanvas to add new category -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList"
            aria-labelledby="offcanvasEcommerceCategoryListLabel">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Thêm mới</h5>
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
                        <label class="form-label" for="store-name">Tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="store-name" placeholder="Vui lòng nhập tên danh mục"
                            aria-label="category title" required />
                        <div class="text-danger store-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="store-slug">Slug<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="store-slug" placeholder="Vui lòng nhập slug"
                            aria-label="category title" required />
                        <div class="text-danger store-slug-error"></div>
                    </div>
                    <!-- Parent category -->
                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="store-parent-category">Danh mục cha</label>
                        <select id="store-parent-category" class="select2-store form-select"
                            data-placeholder="Vui lòng chọn danh mục cha">
                            <option disabled selected value="0">Vui lòng chọn danh mục cha</option>
                            @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">
                                                            @php
                                                                $str = '';
                                                                for ($i = 0; $i < $category->level; $i++) {
                                                                    echo $str;
                                                                    $str .= '|---';
                                                                }
                                                            @endphp
                                                            {{$category->name}}
                                                        </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Description -->
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
                    <!-- Submit and reset -->
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
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceUpdateCategoryList"
            aria-labelledby="offcanvasEcommerceUpdateCategoryList">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEcommerceUpdateCategoryList" class="offcanvas-title">Sửa</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form class="pt-0" id="update-form">
                    <!-- rule -->
                    <div class="mb-3">
                        <div class="small" style="color: red">Bắt buộc*</div>
                    </div>
                    <!-- id -->
                    <input type="number" class="form-control" id="update-id" hidden />
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label" for="update-name">Tên<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" placeholder="Enter category title" id="update-name"
                            aria-label="category title" />
                        <div class="text-danger update-name-error"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="update-slug">Slug<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" id="update-slug" placeholder="Vui lòng nhập slug"
                            aria-label="category title" required />
                        <div class="text-danger update-slug-error"></div>
                    </div>


                    <!-- Parent category -->
                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="update-parent-category">Danh mục cha</label>
                        <select class="select2-update form-select" data-placeholder="Vui lòng chọn danh mục cha"
                            id="update-parent-category">

                            <option disabled selected value="0">Vui lòng chọn danh mục cha</option>
                            @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">
                                                            @php
                                                                $str = '';
                                                                for ($i = 0; $i < $category->level; $i++) {
                                                                    echo $str;
                                                                    $str .= '|---';
                                                                }
                                                            @endphp
                                                            {{$category->name}}
                                                        </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Description -->
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
                    <!-- Submit and reset -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="update-btn">Cập
                            nhật</button>
                        <button type="reset" class="btn bg-label-danger close-offcanvas"
                            data-bs-dismiss="offcanvas">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
