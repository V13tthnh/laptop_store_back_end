<!doctype html>

<html lang="en" class="light-style layout-wide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>In hóa đơn</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice-print.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Content -->

    <div class="invoice-print p-5">
        <div class="d-flex justify-content-between flex-row">
            <div class="mb-4">
                <div class="d-flex svg-illustration mb-3 gap-2">
                    <div class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                fill="#7367F0" />
                        </svg>
                    </div>
                    <span class="app-brand-text fw-bold"> Laptop </span>
                </div>
                <p class="mb-2">Tân Định, hẻm 48 Bùi Thị Xuân</p>
                <p class="mb-0">(+84) 123 456 7891</p>
            </div>
            <div>
                <h4 class="fw-medium">Hóa đơn #{{1}}</h4>
                <div class="mb-2">
                    <span class="text-muted">Ngày tạo:</span>
                    <span class="fw-medium">{{'27/6/2024'}}</span>
                </div>
            </div>
        </div>

        <hr />

        <div class="row d-flex justify-content-between mb-4">
            <div class="col-sm-6 w-50">
                <h6>Khách hàng:</h6>
                <p class="mb-1">Thomas shelby</p>
                <p class="mb-1">Shelby Company Limited</p>
                <p class="mb-1">718-986-6062</p>
                <p class="mb-0">peakyFBlinders@gmail.com</p>
            </div>
            <div class="col-sm-6 w-50">
                <h6>Hóa đơn:</h6>
                <table>
                    <tbody>
                        <tr>
                            <td class="pe-3">Tổng tiền:</td>
                            <td class="fw-medium">$12,110.55</td>
                        </tr>
                        <tr>
                            <td class="pe-3">SĐT:</td>
                            <td>American Bank</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Địa chỉ:</td>
                            <td>United States</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Phương thức thanh toán:</td>
                            <td>Tiền mặt</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table m-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Vuexy Admin Template</td>
                        <td>$32</td>
                        <td>1</td>
                        <td>$32.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Frest Admin Template</td>

                        <td>$22</td>
                        <td>1</td>
                        <td>$22.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Apex Admin Template</td>
                        <td>$17</td>
                        <td>2</td>
                        <td>$34.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Robust Admin Template</td>

                        <td>$66</td>
                        <td>1</td>
                        <td>$66.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="align-top px-4 py-3">
                            <p class="mb-2">
                                <span class="me-1 fw-medium">Người bán:</span>
                                <span>Đinh Viết Thành</span>
                            </p>
                            <span>Cảm ơn vì đã mua hàng</span>
                        </td>
                        <td class="text-end px-4 py-3">
                            <p class="mb-2">Tạm tính:</p>
                            <p class="mb-2">Giảm giá:</p>
                            <p class="mb-0">Tổng tiền:</p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="fw-medium mb-2">$154.25</p>
                            <p class="fw-medium mb-2">$50.00</p>
                            <p class="fw-medium mb-0">$204.25</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-12">
                <span class="fw-medium">Ghi chú:</span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/js/app-invoice-print.js')}}"></script>
</body>

</html>
