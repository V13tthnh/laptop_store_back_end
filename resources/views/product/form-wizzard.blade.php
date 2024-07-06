<div class="col-12">

                                <div class="bs-stepper vertical wizard-modern wizard-modern-vertical mt-2">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#cpu-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Bộ xử lý</span>
                                                    <span class="bs-stepper-subtitle">CPU</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#ram-hardware-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Bộ nhớ RAM, Ổ cứng</span>
                                                    <span class="bs-stepper-subtitle">RAM, hardware</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#screen-hardware-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Màn hình</span>
                                                    <span class="bs-stepper-subtitle">VGA</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#graphic-sound-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Đồ họa và Âm thanh</span>
                                                    <span class="bs-stepper-subtitle">Card màn hình</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#port-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Cổng kết nối & <br>tính năng mở
                                                        rộng</span>
                                                    <span class="bs-stepper-subtitle">Port, webcam, led..</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#size-weight-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">6</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Kích thước & khối lượng</span>
                                                    <span class="bs-stepper-subtitle">Tùy chỉnh KL&KT</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#other-info-modern-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">7</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Thông tin khác</span>
                                                    <span class="bs-stepper-subtitle">Thông tin từ nsx</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <form onSubmit="return false">
                                            <!-- CPU -->
                                            <div id="cpu-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Bộ xử lý</h6>
                                                    <small>Thêm thông số cho bộ xử lý của sản phẩm.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="cpu-info"
                                                            class="form-label">Công nghệ CPU</label>
                                                        <input
                                                            name="cpu-info" class="form-control"
                                                            placeholder="Công nghệ CPU" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="first-name-modern-vertical">Số nhân</label>
                                                        <input type="text" id="cpu-core-info"
                                                            class="form-control" placeholder="Số nhân" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="username-modern-vertical">Số
                                                            luồng</label>
                                                        <input type="text" id="cpu-thread-info"
                                                            class="form-control" placeholder="Số luồng" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="email-modern-vertical">Tốc độ
                                                            CPU</label>
                                                        <input type="text" id="cpu-speed-info"
                                                            class="form-control" placeholder="Tốc độ CPU"
                                                            aria-label="john.doe" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="username-modern-vertical">Tốc độ
                                                            tối đa</label>
                                                        <input type="text" id="cpu-max-speed-info"
                                                            class="form-control" placeholder="Tốc độ tối đa" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="email-modern-vertical">Bộ nhớ
                                                            đệm</label>
                                                        <input type="text" id="email-modern-vertical"
                                                            class="form-control" placeholder="Bộ nhớ đệm"
                                                            aria-label="john.doe" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev" disabled>
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- RAM -->
                                            <div id="ram-hardware-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Bộ nhớ RAM, Ổ cứng</h6>
                                                    <small>Nhập thông tin bộ nhớ RAM, Ổ cứng.</small>
                                                </div>
                                                <div class="row g-3">
                                                <div class="col-md-6">
                                                        <label for="ram-info"
                                                            class="form-label">RAM</label>
                                                        <input id="ram-info"
                                                            name="ram-info" class="form-control"
                                                            placeholder="Chọn loại RAM"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="last-name-modern-vertical">
                                                        Loại RAM</label>
                                                        <input type="text" id="ram-type-info"
                                                            class="form-control" placeholder="Loại RAM" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="country-modern-vertical">Tốc độ Bus RAM</label>
                                                            <input type="text" id="ram-bus-speed-info"
                                                            class="form-control" placeholder="Tốc độ Bus RAM" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="language-modern-vertical">Hỗ trợ RAM tối đa</label>
                                                            <input type="text" id="ram-max-support-info"
                                                            class="form-control" placeholder="Hỗ trợ RAM tối đa" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="last-name-modern-vertical">
                                                        Ổ cứng</label>
                                                        <input type="text" id="hardware-info"
                                                            class="form-control" placeholder="Ổ cứng" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- SCREEN -->
                                            <div id="screen-hardware-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Màn hình</h6>
                                                    <small>Nhập thông số màn hình.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Màn hình</label>
                                                        <input type="text" id="screen-info"
                                                            class="form-control"
                                                            placeholder="Màn hình" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="facebook-modern-vertical">Độ phân giải</label>
                                                        <input type="text" id="screen-resolution-info"
                                                            class="form-control"
                                                            placeholder="Độ phân giải" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="google-modern-vertical">Tần số quét</label>
                                                        <input type="text" id="screen-scanning-info"
                                                            class="form-control"
                                                            placeholder="Tần số quét" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="linkedin-modern-vertical">Độ phủ màu</label>
                                                        <input type="text" id="screen-color-coverage-info"
                                                            class="form-control"
                                                            placeholder="Độ phủ màu" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="linkedin-modern-vertical">Công nghệ màn hình</label>
                                                        <input type="text" id="screen-technical-info"
                                                            class="form-control"
                                                            placeholder="Công nghệ màn hình" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ĐỒ HỌA & ÂM THANH -->
                                            <div id="graphic-sound-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Đồ họa và Âm thanh</h6>
                                                    <small>Nhập thông tin Đồ họa và Âm thanh.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Card màn hình</label>
                                                        <input type="text" id="graphic-card-info"
                                                            class="form-control"
                                                            placeholder="Card màn hình" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="facebook-modern-vertical">Công nghệ âm thanh</label>
                                                        <input type="text" id="sound-technical-info"
                                                            class="form-control"
                                                            placeholder="Công nghệ âm thanh" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- CỔNG KẾT NỐI -->
                                            <div id="port-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Cổng kết nối & tính năng mở rộng</h6>
                                                    <small>Nhập thông tin Cổng kết nối & tính năng mở rộng.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                    <label for="cpu-info"
                                                            class="form-label">Cổng giao tiếp</label>
                                                        <input id="port-info"
                                                            name="cpu-info" class="form-control"
                                                            placeholder="Chọn loại cổng giao tiếp"
                                                            value="Cổng giao tiếp" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="facebook-modern-vertical">Kết nối không dây</label>
                                                        <input type="text" id="wireless-connect-info"
                                                            class="form-control"
                                                            placeholder="Kết nối không dây" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="google-modern-vertical">Khe đọc thẻ nhớ</label>
                                                        <input type="text" id="card-memory-reader-info"
                                                            class="form-control"
                                                            placeholder="Khe đọc thẻ nhớ" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="linkedin-modern-vertical">Webcam</label>
                                                        <input type="text" id="webcam-info"
                                                            class="form-control"
                                                            placeholder="Webcam" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="linkedin-modern-vertical">Đèn bàn phím</label>
                                                        <input type="text" id="led-keyboard-info"
                                                            class="form-control"
                                                            placeholder="Đèn bàn phím" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- KÍCH THƯỚC & KHỐI LƯỢNG -->
                                            <div id="size-weight-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Kích thước & khối lượng</h6>
                                                    <small>Nhập Kích thước & khối lượng.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Kích thước</label>
                                                        <input type="text" id="size-info"
                                                            class="form-control"
                                                            placeholder="Kích thước" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="facebook-modern-vertical">Khối lượng</label>
                                                        <input type="text" id="weight-info"
                                                            class="form-control"
                                                            placeholder="Khối lượng" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="google-modern-vertical">Chất liệu</label>
                                                        <input type="text" id="material-info"
                                                            class="form-control"
                                                            placeholder="Chất liệu" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none me-sm-1">Tiếp</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- THÔNG TIN KHÁC -->
                                            <div id="other-info-modern-vertical" class="content">
                                                <div class="content-header mb-3">
                                                    <h6 class="mb-0">Thông tin khác</h6>
                                                    <small>Thông tin bên lề.</small>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Thông tin Pin</label>
                                                        <input type="text" id="pin-info"
                                                            class="form-control"
                                                            placeholder="Thông tin Pin" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="facebook-modern-vertical">Công suất bộ sạc</label>
                                                        <input type="text" id="charger-capacity-info"
                                                            class="form-control"
                                                            placeholder="Công suất bộ sạc" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Bảo hành</label>
                                                        <input type="text" id="warranty-info"
                                                            class="form-control"
                                                            placeholder="Thông tin Pin" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="twitter-modern-vertical">Màu sắc</label>
                                                        <input type="text" id="color-info"
                                                            class="form-control"
                                                            placeholder="Thông tin Pin" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="google-modern-vertical">Hệ điều hành</label>
                                                        <input type="text" id="operating-system-info"
                                                            class="form-control"
                                                            placeholder="Hệ điều hành" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label"
                                                            for="linkedin-modern-vertical">Thời điểm ra mắt</label>
                                                        <input type="text" id="release-info"
                                                            class="form-control"
                                                            placeholder="Thời điểm ra mắt" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Trước</span>
                                                        </button>
                                                        <button class="btn btn-success btn-submit">Lưu thông só</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
