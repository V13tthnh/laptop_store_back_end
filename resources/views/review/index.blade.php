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
<style>
    .star-rating {
        display: flex;
    }

    .star-rating .filled {
        color: gold;
    }

    .star-rating .empty {
        color: lightgray;
    }
</style>
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

    // Datatable (jquery)
    $(function () {
        const SUCCESS = 200;
        const statusObj = {
            0: { title: 'Chờ duyệt', class: 'bg-label-warning' },
            1: { title: 'Đã duyệt', class: 'bg-label-success' },
        };
        let borderColor, bodyBg, headingColor;
        // Variable declaration for table
        var dt_review_table = $('.datatables-reviews');

        // Brands datatable
        if (dt_review_table.length) {
            var dt_review = dt_review_table.DataTable({
                ajax: { url: '{{route('reviews.data.table')}}', method: 'get', dataType: 'json' },
                columns: [
                    {
                        data: 'user_name', name: 'user.full_name',
                    },
                    { data: 'product_image', orderable: false, searchable: false },
                    { data: 'product_name', name: 'product.name' },
                    {
                        data: 'rating', render: function (data, type, row) {

                            let stars = '<div class="star-rating">';
                            for (let i = 1; i <= 5; i++) {
                                stars += `<span class="${i <= data ? 'filled' : 'empty'}">&#9733;</span>`;
                            }
                            stars += '</div>';
                            return stars;
                        }
                    },
                    { data: 'comment', name: 'comment' },
                    { data: 'created_at', name: 'created_at' },
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
                            if (full['status']) {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<button class="dropdown-item edit-btn" value="' + data + '">Hủy</button>' +
                                    '<button class="dropdown-item delete-btn" value="' + data + '">' +
                                    'Xóa' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            } else {
                                return (
                                    '<div class="d-flex justify-content-sm-center align-items-sm-center">' +
                                    '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>' +
                                    '<div class="dropdown-menu dropdown-menu-end m-0">' +
                                    '<button class="dropdown-item edit-btn" value="' + data + '">Duyệt</button>' +
                                    '<button class="dropdown-item delete-btn" value="' + data + '">' +
                                    'Xóa' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }

                        }
                    }
                ],
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
                buttons: [],
            });
        }

        //update review status
        $('.datatables-reviews').on('click', '.edit-btn', function () {
            let id = $(this).val();
            $.ajax({
                url: "reviews/" + id + "/update",
                method: "post",
                data: {
                    "_token": "{{csrf_token()}}"
                }
            }).done(function (res) {
                dt_review.ajax.reload();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Cập nhật thành công",
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });

                return;
            });
        });

        //delete employee
        $('.datatables-reviews').on('click', '.delete-btn', function () {
            var id = $(this).val();
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "Bạn có muốn xóa mục này.",
                customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light',
                    cancelButton: 'btn btn-secondary waves-effect waves-light'
                },
                buttonsStyling: false,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "reviews/" + id,
                        method: "delete",
                        data: {
                            "_token": "{{csrf_token()}}"
                        }
                    }).done(function (res) {
                        if (res.success) {
                            successNotification(res.message);
                            dt_review.ajax.reload();
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
            dt_review.ajax.reload();
        }

        function successNotification(message) {
            Swal.fire({
                icon: 'success',
                title: 'Đã xóa thành công!',
                text: 'Dữ liệu đánh giá đã được cập nhật.',
                customClass: {
                    confirmButton: 'btn btn-success waves-effect waves-light'
                }
            });
        }

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
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách đánh giá</h4>
    <!-- Suppliers List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-reviews table">
                <thead class="border-top">
                    <tr>
                        <th>Khách hàng</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số sao đánh giá</th>
                        <th>Nội dung</th>
                        <th>Ngày viết</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
@endsection
