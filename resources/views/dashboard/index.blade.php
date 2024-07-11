@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-logistics-dashboard.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
@endsection


@section('js')
<script src="{{asset('assets/js/app-ecommerce-dashboard.js')}}"></script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
<script>
    'use strict';

    (function () {
        let labelColor, headingColor;

        if (isDarkStyle) {
            labelColor = config.colors_dark.textMuted;
            headingColor = config.colors_dark.headingColor;
        } else {
            labelColor = config.colors.textMuted;
            headingColor = config.colors.headingColor;
        }
        const chartColors = {
            donut: {
                series1: config.colors.warning,
                series2: config.colors_label.success,
                series3: config.colors_label.info,
                series4: config.colors_label.danger,
                series5: '#28c76fb3',
            },
            line: {
                series1: config.colors.warning,
                series2: config.colors_label.success,
                series3: config.colors_label.info,
                series4: config.colors_label.danger,
                series5: '#28c76fb3',
            }
        };

        const deliveryExceptionsChartE1 = document.querySelector('#deliveryExceptionsChart');

        $.ajax({
            url: "{{route('dashboard.order.total.summary')}}",
            method: 'get',
            success: function (data) {

                const labels = ['Chờ xác nhận', 'Đã xác nhận', 'Đang giao', 'Đã hủy', 'Đã nhận được hàng'];
                const seriesData = [0, 0, 0, 0, 0];

                data.forEach(status => {
                    switch (status.status) {
                        case 1: seriesData[0] = status.count; break; // Chờ xác nhận
                        case 2: seriesData[1] = status.count; break; // Đã xác nhận
                        case 3: seriesData[2] = status.count; break; // Đang giao
                        case 4: seriesData[3] = status.count; break; // Đã hủy
                        case 5: seriesData[4] = status.count; break; // Đã nhận được hàng
                    }
                });

                const deliveryExceptionsChartConfig = {
                    chart: {
                        height: 420,
                        parentHeightOffset: 0,
                        type: 'donut'
                    },
                    labels: labels,
                    series: seriesData,
                    colors: [
                        chartColors.donut.series1,
                        chartColors.donut.series2,
                        chartColors.donut.series3,
                        chartColors.donut.series4,
                        chartColors.donut.series5
                    ],
                    stroke: {
                        width: 0
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function (val, opt) {
                            return parseInt(val) + '%';
                        }
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        offsetY: 10,
                        markers: {
                            width: 8,
                            height: 8,
                            offsetX: -3
                        },
                        itemMargin: {
                            horizontal: 15,
                            vertical: 5
                        },
                        fontSize: '13px',
                        fontFamily: 'Public Sans',
                        fontWeight: 400,
                        labels: {
                            colors: headingColor,
                            useSeriesColors: false
                        }
                    },
                    tooltip: {
                        theme: false
                    },
                    grid: {
                        padding: {
                            top: 15
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '77%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '26px',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        fontWeight: 500,
                                        offsetY: -30,
                                        formatter: function (val) {
                                            return parseInt(val) + '%';
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '.75rem',
                                        label: 'Trạng thái hóa đơn',
                                        color: labelColor,
                                        formatter: function (w) {
                                            const total = seriesData.reduce((a, b) => a + b, 0);
                                            const percentage = (total !== 0) ? (seriesData.reduce((a, b) => a + b, 0) / total) * 100 : 0;
                                            return percentage.toFixed(0) + '%';
                                        }
                                    }
                                }
                            }
                        }
                    },
                    responsive: [
                        {
                            breakpoint: 420,
                            options: {
                                chart: {
                                    height: 360
                                }
                            }
                        }
                    ]
                };


                if (typeof deliveryExceptionsChartE1 !== undefined && deliveryExceptionsChartE1 !== null) {
                    const deliveryExceptionsChart = new ApexCharts(deliveryExceptionsChartE1, deliveryExceptionsChartConfig);
                    deliveryExceptionsChart.render();
                }
            },
            error: function (error) {
                console.error("Error fetching order status summary:", error);
            }
        });
    })();
</script>
<script>
    'use strict';

    (function () {
        const revenueStartDate = document.querySelector('#revenue-start-date');
        const revenueEndDate = document.querySelector('#revenue-end-date');

        if (revenueStartDate || revenueEndDate) {
            revenueStartDate.flatpickr({
                dateFormat: 'd-m-Y'
            });
            revenueEndDate.flatpickr({
                dateFormat: 'd-m-Y'
            });
        }

        // Lấy ngày hôm nay
        const today = new Date().toISOString().split('T')[0];

        // Thiết lập ngày bắt đầu mặc định là 7 ngày trước ngày hôm nay
        const defaultStartDate = new Date();
        defaultStartDate.setDate(defaultStartDate.getDate() - 7);
        const startDate = defaultStartDate.toISOString().split('T')[0];

        // Thiết lập ngày kết thúc mặc định là ngày hôm nay
        const endDate = today;
        $('#revenue-end-date').val(endDate);
        $('#revenue-start-date').val(startDate);

        // Function to fetch and render revenue data
        function fetchRevenueData(startDate, endDate) {
            $.ajax({
                url: '{{route('dashboard.revenue')}}',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function (data) {
                    console.log(data);
                    const categories = data.map(order => order.date);
                    const revenueData = data.map(order => parseFloat(order.revenue.replace(/\./g, '').replace(' đ', '')));

                    const areaChartConfig = {
                        chart: {
                            height: 400,
                            type: 'area',
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: false,
                            curve: 'straight'
                        },
                        legend: {
                            show: true,
                            position: 'top',
                            horizontalAlign: 'start',
                            labels: {
                                colors: legendColor,
                                useSeriesColors: false
                            }
                        },
                        grid: {
                            borderColor: borderColor,
                            xaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        },
                        colors: [chartColors.area.series3, chartColors.area.series2, chartColors.area.series1],
                        series: [
                            {
                                name: 'Doanh thu',
                                data: revenueData
                            }
                        ],
                        xaxis: {
                            categories: categories,
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '13px'
                                },
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '13px'
                                },
                                formatter: function (value) {
                                    return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                                }
                            }
                        },
                        fill: {
                            opacity: 1,
                            type: 'solid'
                        },
                        tooltip: {
                            shared: false
                        }
                    };

                    // Xóa biểu đồ cũ nếu đã tồn tại
                    if (window.areaChart) {
                        window.areaChart.destroy();
                    }

                    const areaChartEl = document.querySelector('#lineAreaChart');
                    if (typeof areaChartEl !== undefined && areaChartEl !== null) {
                        window.areaChart = new ApexCharts(areaChartEl, areaChartConfig);
                        window.areaChart.render();
                    }
                },
                error: function (error) {
                    console.error("Có lỗi xảy ra:", error);
                }
            });
        }

        // Fetch initial data for the past week
        fetchRevenueData(startDate, endDate);

        $('#revenue-end-date, #revenue-start-date').change(function () {
            const startDate = $('#revenue-start-date').val();
            const endDate = $('#revenue-end-date').val();
            console.log("Ngày bắt đầu: ", startDate);
            console.log("Ngày kết thúc: ", endDate);
        });

        $('#filter-btn').click(function () {
            const startDate = $('#revenue-start-date').val();
            const endDate = $('#revenue-end-date').val();
            fetchRevenueData(startDate, endDate);
        });

        let cardColor, headingColor, labelColor, borderColor, legendColor;

        if (isDarkStyle) {
            cardColor = config.colors_dark.cardColor;
            headingColor = config.colors_dark.headingColor;
            labelColor = config.colors_dark.textMuted;
            legendColor = config.colors_dark.bodyColor;
            borderColor = config.colors_dark.borderColor;
        } else {
            cardColor = config.colors.cardColor;
            headingColor = config.colors.headingColor;
            labelColor = config.colors.textMuted;
            legendColor = config.colors.bodyColor;
            borderColor = config.colors.borderColor;
        }

        // Color constant
        const chartColors = {
            column: {
                series1: '#826af9',
                series2: '#d2b0ff',
                bg: '#f8d3ff'
            },
            donut: {
                series1: '#fee802',
                series2: '#3fd0bd',
                series3: '#826bf8',
                series4: '#2b9bf4'
            },
            area: {
                series1: '#29dac7',
                series2: '#60f2ca',
                series3: '#a5f8cd'
            }
        };
    })();
</script>
@endsection

@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Statistics -->
        <div class="col-xl-12 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Thống kê</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="ti ti-chart-pie-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalOrders}}</h5>
                                    <small>Số lượng hóa đơn</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalCustomers}}</h5>
                                    <small>Số lượng khách hàng</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="ti ti-shopping-cart ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalProductInventory}}</h5>
                                    <small>Số lượng tồn kho</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="ti ti-currency-dollar ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{number_format($totalProducts, 0, ',', '.') . 'đ'}}</h5>
                                    <small>Tổng hóa đơn nhập</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->

        <!-- Line Area Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Doanh số bán hàng</h5>
                        <small class="text-muted">Hệ thống website bán laptop</small>
                    </div>
                    <div class="mb-3">
                        <label for="revenue-start-date" class="form-label">Từ ngày:</label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYYY" id="revenue-start-date" />
                    </div>
                    <div class="mb-3">
                        <label for="revenue-end-date" class="form-label">Đến ngày:</label>
                        <input type="text" class="form-control" placeholder="DD-MM-YYYY" id="revenue-end-date" />
                    </div>
                    <div class="mb-3">
                        <label for="revenue-end-date" class="form-label">.</label>
                        <button type="submit" id="filter-btn" class="btn btn-primary ">Lọc</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="lineAreaChart"></div>
                </div>
            </div>
        </div>
        <!-- /Line Area Chart -->

        <!-- Revenue Report -->
        <div class="col-12 col-xl-8 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Trạng thái đơn hàng</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div id="deliveryExceptionsChart" class="pt-md-4"></div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report -->


        <!-- Popular Product -->
        <div class="col-md-6 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Sản phẩm bán chạy</h5>
                        <small class="text-muted">Tổng {{$totalQuantityProductSold}} sản phẩm đã bán ra</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="popularProduct" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($bestSellingProducts as $product)
                            <li class="d-flex mb-4 pb-1">
                                <div class="me-3">
                                    <img src="/{{$product->image}}" alt="User" class="rounded" width="46" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{$product->name}}</h6>
                                        <small class="text-muted d-block">Đã bán: {{$product->total_quantity }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <p class="mb-0 fw-medium">{{$product->unit_price}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Popular Product -->
    </div>
</div>
@endsection
