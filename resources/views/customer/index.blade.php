@extends('layout')

@section('js')
<script>
    'use strict';

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

        // Variable declaration for table
        var dt_customer_table = $('.datatables-customers'),
            select2 = $('.select2'),
            customerView = 'app-ecommerce-customer-details-overview.html';
        if (select2.length) {
            var $this = select2;
            $this.wrap('<div class="position-relative"></div>').select2({
                placeholder: 'United States ',
                dropdownParent: $this.parent()
            });
        }

        // customers datatable
        if (dt_customer_table.length) {
            var dt_customer = dt_customer_table.DataTable({
                ajax: assetsPath + 'json/ecommerce-customer-all.json', // JSON file to add data
                columns: [
                    // columns according to JSON
                    { data: '' },
                    { data: 'id' },
                    { data: 'customer' },
                    { data: 'customer_id' },
                    { data: 'country' },
                    { data: 'order' },
                    { data: 'total_spent' }
                ],
                columnDefs: [
                    {
                        // For Responsive
                        className: 'control',
                        searchable: false,
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function (data, type, full, meta) {
                            return '';
                        }
                    },
                    {
                        // For Checkboxes
                        targets: 1,
                        orderable: false,
                        searchable: false,
                        responsivePriority: 3,
                        checkboxes: true,
                        render: function () {
                            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                        },
                        checkboxes: {
                            selectAllRender: '<input type="checkbox" class="form-check-input">'
                        }
                    },
                    {
                        // customer full name and email
                        targets: 2,
                        responsivePriority: 1,
                        render: function (data, type, full, meta) {
                            var $name = full['customer'],
                                $email = full['email'],
                                $image = full['image'];

                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6);
                                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $name = full['customer'],
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                            }
                            // Creates full output for row
                            var $row_output =
                                '<div class="d-flex justify-content-start align-items-center customer-name">' +
                                '<div class="avatar-wrapper">' +
                                '<div class="avatar me-2">' +
                                $output +
                                '</div>' +
                                '</div>' +
                                '<div class="d-flex flex-column">' +
                                '<a href="' +
                                customerView +
                                '" ><span class="fw-medium">' +
                                $name +
                                '</span></a>' +
                                '<small class="text-muted">' +
                                $email +
                                '</small>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    {
                        // customer Role
                        targets: 3,
                        render: function (data, type, full, meta) {
                            var $id = full['customer_id'];

                            return "<span class='h6 mb-0'>#" + $id + '</span>';
                        }
                    },
                    {
                        // Plans
                        targets: 4,
                        render: function (data, type, full, meta) {
                            var $plan = full['country'];
                            var $code = full['country_code'];

                            if ($code) {
                                var $output_code = `<i class ="fis fi fi-${$code} rounded-circle me-2 fs-3"></i>`;
                            } else {
                                // For Avatar badge
                                var $output_code = `<i class ="fis fi fi-xx rounded-circle me-2 fs-3"></i>`;
                            }

                            var $row_output =
                                '<div class="d-flex justify-content-start align-items-center customer-country">' +
                                '<div>' +
                                $output_code +
                                '</div>' +
                                '<div>' +
                                '<span>' +
                                $plan +
                                '</span>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    {
                        // customer Status
                        targets: 5,
                        render: function (data, type, full, meta) {
                            var $status = full['order'];

                            return '<span>' + $status + '</span>';
                        }
                    },
                    {
                        // customer Spent
                        targets: 6,
                        render: function (data, type, full, meta) {
                            var $spent = full['total_spent'];

                            return '<span class="h6 mb-0">' + $spent + '</span>';
                        }
                    }
                ],
                order: [[2, 'desc']],
                dom:
                    '<"card-header d-flex flex-wrap pb-md-2"' +
                    '<"d-flex align-items-center me-5"f>' +
                    '<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end gap-3 gap-sm-0 flex-wrap flex-sm-nowrap"lB>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',

                language: {
                    sLengthMenu: '_MENU_',
                    search: '',
                    searchPlaceholder: 'Search Order'
                },
                // Buttons with Dropdown
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn btn-label-secondary dropdown-toggle me-3 waves-effect waves-light',
                        text: '<i class="ti ti-download me-1"></i>Export',
                        buttons: [
                            {
                                extend: 'print',
                                text: '<i class="ti ti-printer me-2" ></i>Print',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6],
                                    // prevent avatar to be print
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('customer-name')) {
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
                                text: '<i class="ti ti-file me-2" ></i>Csv',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('customer-name')) {
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
                                text: '<i class="ti ti-file-export me-2"></i>Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('customer-name')) {
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
                                text: '<i class="ti ti-file-text me-2"></i>Pdf',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('customer-name')) {
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
                                    columns: [1, 2, 3, 4, 5, 6],
                                    // prevent avatar to be display
                                    format: {
                                        body: function (inner, coldex, rowdex) {
                                            if (inner.length <= 0) return inner;
                                            var el = $.parseHTML(inner);
                                            var result = '';
                                            $.each(el, function (index, item) {
                                                if (item.classList !== undefined && item.classList.contains('customer-name')) {
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
                        text: '<i class="ti ti-plus me-0 me-sm-1 mb-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add Customer</span>',
                        className: 'add-new btn btn-primary py-2 waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'offcanvas',
                            'data-bs-target': '#offcanvasEcommerceCustomerAdd'
                        }
                    }
                ],
                // For responsive popup
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                var data = row.data();
                                return 'Details of ' + data['customer'];
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
                }
            });
            $('.dataTables_length').addClass('ms-n2 mt-0 mt-md-3 me-2');
            $('.dt-action-buttons').addClass('pt-0');
            $('.dataTables_filter').addClass('ms-n3');
            $('.dt-buttons').addClass('d-flex flex-wrap');
        }

        // Delete Record
        $('.datatables-customers tbody').on('click', '.delete-record', function () {
            dt_customer.row($(this).parents('tr')).remove().draw();
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });

    // Validation & Phone mask
    (function () {
        const phoneMaskList = document.querySelectorAll('.phone-mask'),
            eCommerceCustomerAddForm = document.getElementById('eCommerceCustomerAddForm');

        // Phone Number
        if (phoneMaskList) {
            phoneMaskList.forEach(function (phoneMask) {
                new Cleave(phoneMask, {
                    phone: true,
                    phoneRegionCode: 'US'
                });
            });
        }
        // Add New customer Form Validation
        const fv = FormValidation.formValidation(eCommerceCustomerAddForm, {
            fields: {
                customerName: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter fullname '
                        }
                    }
                },
                customerEmail: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your email'
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    eleValidClass: '',
                    rowSelector: function (field, ele) {
                        // field is the field name & ele is the field element
                        return '.mb-3';
                    }
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                // Submit the form when all fields are valid
                // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                autoFocus: new FormValidation.plugins.AutoFocus()
            }
        });
    })();

</script>
@endsection

@section('main-content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2"><span class="text-muted fw-light">eCommerce /</span> All Customers</h4>

    <!-- customers List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-customers table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Customer</th>
                        <th class="text-nowrap">Customer Id</th>
                        <th>Country</th>
                        <th>Order</th>
                        <th class="text-nowrap">Total Spent</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new customer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCustomerAdd"
            aria-labelledby="offcanvasEcommerceCustomerAddLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasEcommerceCustomerAddLabel" class="offcanvas-title">Add Customer</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="ecommerce-customer-add pt-0" id="eCommerceCustomerAddForm" onsubmit="return false">
                    <div class="ecommerce-customer-add-basic mb-3">
                        <h6 class="mb-3">Basic Information</h6>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-name">Name*</label>
                            <input type="text" class="form-control" id="ecommerce-customer-add-name"
                                placeholder="John Doe" name="customerName" aria-label="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-email">Email*</label>
                            <input type="text" id="ecommerce-customer-add-email" class="form-control"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                name="customerEmail" />
                        </div>
                        <div>
                            <label class="form-label" for="ecommerce-customer-add-contact">Mobile</label>
                            <input type="text" id="ecommerce-customer-add-contact" class="form-control phone-mask"
                                placeholder="+(123) 456-7890" aria-label="+(123) 456-7890" name="customerContact" />
                        </div>
                    </div>

                    <div class="ecommerce-customer-add-shiping mb-3 pt-3">
                        <h6 class="mb-3">Shipping Information</h6>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-address">Address Line 1</label>
                            <input type="text" id="ecommerce-customer-add-address" class="form-control"
                                placeholder="45 Roker Terrace" aria-label="45 Roker Terrace" name="customerAddress1" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-address-2">Address Line 2</label>
                            <input type="text" id="ecommerce-customer-add-address-2" class="form-control"
                                aria-label="address2" name="customerAddress2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-town">Town</label>
                            <input type="text" id="ecommerce-customer-add-town" class="form-control"
                                placeholder="New York" aria-label="New York" name="customerTown" />
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-6">
                                <label class="form-label" for="ecommerce-customer-add-state">State / Province</label>
                                <input type="text" id="ecommerce-customer-add-state" class="form-control"
                                    placeholder="Southern tip" aria-label="Southern tip" name="customerState" />
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label" for="ecommerce-customer-add-post-code">Post Code</label>
                                <input type="text" id="ecommerce-customer-add-post-code" class="form-control"
                                    placeholder="734990" aria-label="734990" name="pin" pattern="[0-9]{8}"
                                    maxlength="8" />
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="ecommerce-customer-add-country">Country</label>
                            <select id="ecommerce-customer-add-country" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-sm-flex mb-3 pt-3">
                        <div class="me-auto mb-2 mb-md-0">
                            <h6 class="mb-0">Use as a billing address?</h6>
                            <small class="text-muted">If you need more info, please check budget.</small>
                        </div>
                        <label class="switch m-auto pe-2">
                            <input type="checkbox" class="switch-input" />
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                        </label>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
                        <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
