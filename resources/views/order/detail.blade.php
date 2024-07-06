@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('js')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                <div class="app-brand-logo demo">
                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                            fill="#7367F0')}}" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                            fill="#161616')}}" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                            fill="#161616')}}" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                            fill="#7367F0')}}" />
                                    </svg>
                                </div>
                                <span class="app-brand-text fw-bold fs-4"> Laptop </span>
                            </div>
                            <p class="mb-2">Tân Định, hẻm 48 Bùi Thị Xuân</p>
                            <p class="mb-0">(+84) 123 456 7891</p>
                        </div>
                        <div>
                            <h4 class="fw-medium mb-2">Hóa đơn #{{1}}</h4>
                            <div class="mb-2 pt-1">
                                <span>Ngày tạo:</span>
                                <span class="fw-medium">{{'27/06/2024'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0')}}" />
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="mb-3">Khách hàng:</h6>
                            <p class="mb-1">Thomas shelby</p>
                            <p class="mb-1">718-986-6062</p>
                            <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                            <h6 class="mb-4">Hóa đơn:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-4">Tổng tiền:</td>
                                        <td class="fw-medium">$12,110.55</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">SĐT</td>
                                        <td>American Bank</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">Địa chỉ:</td>
                                        <td>United States</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-4">Phương thức thanh toán:</td>
                                        <td>Tiền mặt</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive border-top">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>1</td>
                                <td class="text-nowrap">Vuexy Admin Template</td>

                                <td>$32</td>
                                <td>1</td>
                                <td>$32.00</td>
                            </tr>
                            <tr>
                            <td>2</td>
                                <td class="text-nowrap">Frest Admin Template</td>

                                <td>$22</td>
                                <td>1</td>
                                <td>$22.00</td>
                            </tr>
                            <tr>
                            <td>3</td>
                                <td class="text-nowrap">Apex Admin Template</td>

                                <td>$17</td>
                                <td>2</td>
                                <td>$34.00</td>
                            </tr>
                            <tr>
                            <td>4</td>
                                <td class="text-nowrap">Robust Admin Template</td>

                                <td>$66</td>
                                <td>1</td>
                                <td>$66.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="align-top px-4 py-4">
                                    <p class="mb-2 mt-3">
                                        <span class="ms-3 fw-medium">Người bán:</span>
                                        <span>Laptop</span>
                                    </p>
                                    <span class="ms-3">Cảm ơn vì đã mua hàng </span>
                                </td>
                                <td class="text-end pe-3 py-4">
                                    <p class="mb-2 pt-3">Tổng tạm</p>
                                    <p class="mb-2">Giảm giá</p>
                                    <p class="mb-0 pb-3"><strong>Tổng:</strong></p>
                                </td>
                                <td class="ps-2 py-4">
                                    <p class="fw-medium mb-2 pt-3">$154.25</p>
                                    <p class="fw-medium mb-2">$50.00</p>
                                    <p class="fw-medium mb-0 pb-3"><strong>$204.25</strong></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-medium">Ghi chú:</span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas"
                        data-bs-target="#sendInvoiceOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                class="ti ti-send ti-xs me-2"></i>Gửi đến</span>
                    </button>
                    <button class="btn btn-label-secondary d-grid w-100 mb-2">Tải xuống</button>
                    <a class="btn btn-label-secondary d-grid w-100 mb-2" target="_blank"
                        href="/admin/orders/1/print">
                        In hóa đơn
                    </a>

                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>

    <!-- Offcanvas -->
    <!-- Send Invoice Sidebar -->
    <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
        <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title">Send Invoice</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0 flex-grow-1">
            <form>
                <div class="mb-3">
                    <label for="invoice-from" class="form-label">From</label>
                    <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                        placeholder="company@email.com')}}" />
                </div>
                <div class="mb-3">
                    <label for="invoice-to" class="form-label">To</label>
                    <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                        placeholder="company@email.com')}}" />
                </div>
                <div class="mb-3">
                    <label for="invoice-subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="invoice-subject"
                        value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods')}}" />
                </div>
                <div class="mb-3">
                    <label for="invoice-message" class="form-label">Message</label>
                    <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                </div>
                <div class="mb-4">
                    <span class="badge bg-label-primary">
                        <i class="ti ti-link ti-xs"></i>
                        <span class="align-middle">Invoice Attached</span>
                    </span>
                </div>
                <div class="mb-3 d-flex flex-wrap">
                    <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Send Invoice Sidebar -->

    <!-- Add Payment Sidebar -->
    <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
        <div class="offcanvas-header mb-3">
            <h5 class="offcanvas-title">Add Payment</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                <p class="mb-0">Invoice Balance:</p>
                <p class="fw-medium mb-0">$5000.00</p>
            </div>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="invoiceAmount">Payment Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount"
                            placeholder="100')}}" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="payment-date">Payment Date</label>
                    <input id="payment-date" class="form-control invoice-date" type="text')}}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="payment-method">Payment Method</label>
                    <select class="form-select" id="payment-method">
                        <option value="" selected disabled>Select payment method</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Paypal">Paypal</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="payment-note">Internal Payment Note</label>
                    <textarea class="form-control" id="payment-note" rows="2"></textarea>
                </div>
                <div class="mb-3 d-flex flex-wrap">
                    <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Add Payment Sidebar -->

    <!-- /Offcanvas -->
</div>
@endsection