@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('js')
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">Trang chủ /</span> Chi tiết hóa đơn #{{$invoice->id}}</h4>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
            <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">
                Order #{{$invoice->id}} <span id="invoice_status" class="badge bg-label-secondary">Đơn mới</span>
            </h5>
            <p class="text-body">Ngày tạo: {{$invoice->created_at}}</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-2">
            <a href="/admin/invoices/{{$invoice->id}}/edit" class="btn btn-label-primary delete-order">Sửa hóa đơn</a>
        </div>
    </div>

    <!-- Order Details Table -->

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Chi tiết hóa đơn</h5>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-order-details table border-top">
                        <thead>
                            <tr>
                                <th class="w-50">Sản phẩm</th>
                                <th class="w-25">Số lượng</th>
                                <th class="w-25">Giá nhập</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoiceDetails as $detail)
                                <tr>
                                    <td>
                                    @foreach($detail->product->images as $image)
                                        <img src="{{'/' . $image->url}}" alt="Product Image" width="100">
                                        @break
                                    @endforeach
                                    {{ $detail->product->name }}
                                    </td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->cost_price }}</td>
                                    <td>{{ $detail->cost_price * $detail->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Tạm tính:</span>
                                <h6 class="mb-0">{{$invoice->total}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">Tổng thực tế:</h6>
                                <h6 class="mb-0">{{$invoice->total}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title m-0">Thông tin nhân viên</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2">
                            <img src="/{{$invoice->user->avatar}}" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div class="d-flex flex-column">
                            <a href="app-user-view-account.html" class="text-body text-nowrap">
                                <h6 class="mb-0">{{$invoice->user->full_name}}</h6>
                            </a>
                            <small class="text-muted">ID: #{{$invoice->user->id}}</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Thông tin liên hệ</h6>
                        <h6>
                            <a href="/admin/employees">Chỉnh sửa</a>
                        </h6>
                    </div>
                    <p class="mb-1">Email: {{$invoice->user->email}}</p>
                    <p class="mb-0">SĐT: {{$invoice->user->phone}}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title m-0">Thông tin vận chuyển</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline pb-0 mb-0">
                        <li class="timeline-item timeline-item-transparent border-primary">
                            <span class="timeline-point timeline-point-primary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Đơn mới (Hóa đơn ID: #{{$invoice->id}})</h6>
                                    <span class="text-muted">{{$invoice->created_at}}</span>
                                </div>
                                <p class="mt-2">Nhân viên: {{$invoice->user->full_name}}</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-left-dashed">
                            <span class="timeline-point timeline-point-secondary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Chờ duyệt</h6>
                                    <span class="text-muted">{{$invoice->created_at}}</span>
                                </div>
                                <p class="mt-2">Nhân viên: {{$invoice->user->full_name}}</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-left-dashed">
                            <span class="timeline-point timeline-point-secondary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Đã duyệt</h6>
                                    <span class="text-muted">{{$invoice->created_at}}</span>
                                </div>
                                <p class="mt-2">Nhân viên: {{$invoice->user->full_name}}</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-left-dashed">
                            <span class="timeline-point timeline-point-secondary"></span>
                            <div class="timeline-event">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Đang giao</h6>
                                    <span class="text-muted">{{$invoice->created_at}}</span>
                                </div>
                                <p class="mt-2">Nhân viên: {{$invoice->user->full_name}}</p>
                            </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                            <span class="timeline-point timeline-point-secondary"></span>
                            <div class="timeline-event pb-0">
                                <div class="timeline-header">
                                    <h6 class="mb-0">Đã nhận được hàng</h6>
                                </div>
                                <p class="mt-2 mb-0">Nhân viên: {{$invoice->user->full_name}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
