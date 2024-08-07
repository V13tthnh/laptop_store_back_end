@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script>
    'use strict';
    (function () {
        const formData = new FormData();
        const fileImages = [];
        const SUCCESS = 200;
        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#add-product-description'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });


        const previewTemplate = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`;

        // Basic Dropzone
        const dropzoneBasic = document.querySelector('#dropzone-basic');
        if (dropzoneBasic) {
            const myDropzone = new Dropzone(dropzoneBasic, {
                previewTemplate: previewTemplate,
                maxFilesize: 3.0,
                acceptedFiles: '.jpg,.jpeg,.png,.gif',
                addRemoveLinks: true,
                maxFiles: 20,
                parallelUploads: 10,
                uploadMultiple: true,
                success: function (file, response) {
                    formData.append("images[]", file);
                }
            });
        }



        //get slug
        $('#add-product-name').change(function () {
            $.ajax({
                url: '{{route('products.check-slug')}}',
                method: 'get',
                data: {
                    'name': $(this).val()
                }
            }).done(function (res) {
                if (res.success == 200) {
                    $('#add-product-slug').val(res.slug);
                } else {
                    return;
                }
            });
        });

        //save product specification
        $('#save-product-sp-btn').click(function () {
            $('.add-product-product-sp-error').text('');
            let product_sp_id = [];
            let product_sp_values = [];

            $('.add-product-specification').each(function () {
                var value = $(this).val();
                if (!value) {
                    $('.add-product-product-sp-error').text('Có trường thông tin đang bỏ rỗng, vui lòng kiểm tra kỹ trước khi lưu');
                    product_sp_id = [];
                    product_sp_values = [];
                    return false;
                }
                product_sp_id.push(value);
            });

            $('.add-product-specification-detail').each(function () {
                var value = $(this).val();
                if (!value) {
                    $('.add-product-product-sp-error').text('Có trường thông tin đang bỏ rỗng, vui lòng kiểm tra kỹ trước khi lưu');
                    product_sp_id = [];
                    product_sp_values = [];
                    return false;
                }
                product_sp_values.push(value);
            });

            if (product_sp_id.length !== product_sp_values.length) {
                $('.add-product-product-sp-error').text('Có trường thông tin đang bỏ rỗng, vui lòng kiểm tra kỹ trước khi lưu   .');
                return;
            }

            for (var i = 0; i < product_sp_id.length; i++) {
                formData.append("product_sp_id[]", product_sp_id[i]);
                formData.append("product_sp_value[]", product_sp_values[i]);

            }
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            successNotification('Đã lưu thông số sản phẩm.');
        });

        //add product
        $('#add-btn').click(function () {
            if (!formData.has("product_sp_id[]") || !formData.has("product_sp_value[]")) {
                warningNotification('Vui lòng lưu thuộc tính sản phẩm');
                return;
            }

            let name = $('#add-product-name').val();
            let slug = $('#add-product-slug').val();
            let sku = $('#add-product-sku').val();
            let brand_id = $('#add-product-brand option:selected').val();
            let category_id = $('#add-product-category option:selected').val();
            let featured = $('#add-product-featured').is(':checked') ? 1 : 0;
            let status = $('#add-product-status').val();
            let description = editorInstance.getData();


            formData.append("_token", "{{csrf_token()}}");
            formData.append("name", name);
            formData.append("slug", slug);
            formData.append("SKU", sku);
            formData.append("description", description);
            formData.append("brand_id", brand_id);
            formData.append("category_id", category_id);
            formData.append("featured", featured);
            formData.append("status", status);

            $.ajax({
                url: "{{route('products.store')}}",
                method: "post",
                data: formData,
                contentType: false,
                processData: false,
            }).done(function (res) {
                if (res.success == SUCCESS) {
                    successfulNotification(res.message);
                    window.location.href = '/admin/products';
                }
            }).fail(function (res) {
                var errors = res.responseJSON.errors;
                showValidationErrors(errors, '#add-product-form', '.add-product-');
            });
        });

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

        //show errors
        function showValidationErrors(errors, formClass, errorClass) {
            $(formClass).addClass('was-validated');
            $.each(errors, function (key, value) {
                $(errorClass + key + '-error').text(value[0]);
                $(errorClass + key + '-error').text(value[1]);
                $(errorClass + key + '-error').text(value[2]);
                $(errorClass + key + '-error').text(value[3]);
                $(errorClass + key + '-error').text(value[4]);
            });
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
    })();

    //Jquery to handle the e-commerce product add page
    $(function () {
        // Select2
        var select2 = $('.select2');
        if (select2.length) {
            select2.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    dropdownParent: $this.parent(),
                    placeholder: $this.data('placeholder') // for dynamic placeholder
                });
            });
        }

        var formRepeater = $('.form-repeater');
        // Form Repeater
        if (formRepeater.length) {
            var row = 2;
            var col = 1;
            formRepeater.on('submit', function (e) {
                e.preventDefault();
            });
            formRepeater.repeater({
                show: function () {
                    var fromControl = $(this).find('.form-control, .form-select');
                    var formLabel = $(this).find('.form-label');

                    fromControl.each(function (i) {
                        var id = 'form-repeater-' + row + '-' + col;
                        $(fromControl[i]).attr('id', id);
                        $(formLabel[i]).attr('for', id);
                        col++;
                    });

                    row++;
                    $(this).slideDown();
                    $('.select2-container').remove();
                    $('.select2.form-select').select2({
                        placeholder: 'Placeholder text'
                    });
                    $('.select2-container').css('width', '100%');
                    $('.form-repeater:first .form-select').select2({
                        dropdownParent: $(this).parent(),
                        placeholder: 'Placeholder text'
                    });
                    $('.position-relative .select2').each(function () {
                        $(this).select2({
                            dropdownParent: $(this).closest('.position-relative')
                        });
                    });
                }
            });
        }
    });
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">Trang chủ /</span><span class="fw-medium"> Thêm sản phẩm</span>
    </h4>

    <div class="app-ecommerce">
        <!-- Add Product -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex align-content-center flex-wrap gap-3">
                <button type="submit" class="btn btn-primary" id="add-btn">Lưu</button>
                <div class="d-flex gap-3">
                    <a href="{{route('products.index')}}" class="btn btn-label-danger">Hủy</a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-8">
                <form id="add-product-form">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Thông tin sản phẩm</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">Tên<span style="color: red">
                                        *</span></label>
                                <input type="text" class="form-control add-product-name" placeholder="Tên sản phẩm"
                                    name="add-product-name" id="add-product-name" aria-label="Product title" />
                                <div class="text-danger add-product-name-error"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="add-product-slug">Slug<span style="color: red">
                                            *</span></label>
                                    <span class="help-block"><code>https://localhost:3000/</code>{slug}</span>
                                    <input type="text" class="form-control" id="add-product-slug" placeholder="SLUG"
                                        name="productSku" aria-label="Product SLUG" />
                                    <div class="text-danger add-product-slug-error"></div>

                                </div>
                                <div class="col">
                                    <label class="form-label" for="add-product-sku">SKU<span style="color: red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="add-product-sku" placeholder="01234567"
                                        name="add-product-sku" aria-label="Product barcode" />
                                    <div class="text-danger add-product-sku-error"></div>
                                </div>
                            </div>
                            <!-- Description -->
                            <div>
                                <label class="form-label">Mô tả / bài viết</label>
                                <!-- <div class="form-control p-0 pt-1">
                                    <div class="comment-toolbar border-0 border-bottom">
                                        <div class="d-flex justify-content-start">
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
                                    <div class="comment-editor border-0 pb-4" id="add-product-description"></div>
                                </div> -->
                                <textarea id="add-product-description"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Product Information -->
                <!-- Media -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Ảnh</h5>
                    </div>
                    <div class="card-body">
                        <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick">
                                <p class="fs-4 note needsclick pt-3 mb-1">Kéo thả ảnh của bạn vào đây</p>
                                <p class="text-muted d-block fw-normal mb-2">hoặc</p>
                                <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Chọn ảnh
                                    từ thiết bị</span>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" accept="image/*" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Second column -->

            <!-- Second column -->
            <div class="col-12 col-lg-4">

                <!-- Organize Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin chung</h5>
                    </div>
                    <div class="card-body">
                        <!-- Brands -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="vendor"> Thương hiệu </label>
                            <select id="add-product-brand" class="select2 form-select"
                                data-placeholder="Chọn thương hiệu">
                                <option value="" disabled selected>Chọn thương hiệu</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger add-product-brand-id-error"></div>
                        </div>
                        <!-- Category -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                for="category-org">
                                <span>Danh mục</span><a href="{{route('categories.index')}}" class="fw-medium">Thêm danh
                                    mục mới</a>
                            </label>
                            <select id="add-product-category" class="select2 form-select"
                                data-placeholder="Chọn danh mục">
                                <option value="" disabled selected>Chọn danh mục</option>
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
                            <div class="text-danger add-product-category-id-error"></div>
                        </div>
                        <!-- Status -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Trạng thái </label>
                            <select id="add-product-status" class="select2 form-select" data-placeholder="Xuất bản">
                                <option value="1" selected>Xuất bản</option>
                                <option value="2">Chờ xét duyệt</option>
                                <option value="3">Bản nháp</option>
                            </select>
                        </div>
                        <!-- Featured -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="switch">
                                <span class="switch-label">Sản phẩm nổi bật</span>
                                <input type="checkbox" id="add-product-featured" class="switch-input" />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Organize Card -->
            </div>
            <!-- /Second column -->
            <div class="col-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thuộc tính</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-danger add-product-product-sp-error"></div>
                        <form class="form-repeater">
                            <div data-repeater-list="group-a">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="mb-3 col-4">
                                            <label class="form-label" for="form-repeater-1-1">Thuộc tính</label>
                                            <select id="form-repeater-1-1"
                                                class="select2 form-select add-product-specification"
                                                data-placeholder="Thông số">
                                                @foreach($productSpecifications as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-8">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label class="form-label invisible" for="form-repeater-1-2">Not
                                                        visible</label>
                                                    <input type="text" id="form-repeater-1-2"
                                                        name="add-product-specification-detail[]"
                                                        class="form-control add-product-specification-detail"
                                                        placeholder="Giá trị thuộc tính" />
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                        <i class="ti ti-x ti-xs me-1"></i>Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary" data-repeater-create>Thêm thuộc tính
                                    mới</button>
                            </div>
                            <button class="btn btn-primary mt-5" id="save-product-sp-btn">Lưu thuộc tính</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
