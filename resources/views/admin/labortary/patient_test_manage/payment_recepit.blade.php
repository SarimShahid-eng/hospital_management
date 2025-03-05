<head>
    <title>Hospital Management | {{ @$tittle }}</title>
    <meta charset="utf-8" />
    <link rel="canonical" href="finance-performance.html" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/media/logos/favicon.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-js') }}/css/sweetalert2.min.css?{{ date('d-m-Y') }}" rel="stylesheet" type="text/css" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
</head>
<!--begin::Card body-->
<div class="card-body py-20">
    <!-- begin::Wrapper-->
    <div class="container mx-auto w-100">
        <!-- begin::Header-->
        <div class="d-flex justify-content-between flex-column flex-sm-row mb-15">
            <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7"> Payment Receipt</h4>
            <div class="text-sm-end w-50">
                <!--begin::Logo-->
                <a href="#" class="d-block mw-150px ms-sm-auto">
                    <img alt="Logo" src="{{ asset('assets') }}/receipt_image/payment_slip/print_image.png"
                        class="w-100">
                </a>
                <!--end::Logo-->
                <!--begin::Address-->
                <div class="text-sm-end fw-semibold fs-7 text-muted mt-7 ">
                    <span>164-B Aptech Computer Center Street, Unit No. 02, Latifabad Hyderabad
                        Contact # 03162129596 0223407813</span>
                </div>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="pb-12">
            <div class="d-flex flex-column gap-7 gap-md-10">
                <div class="fw-bold fs-2">
                    Dear {{ $lab_appointments->users->firstname }}
                    ,<br>
                    <span class="text-muted fs-5">Here are your payment details.Thank you for choosing our
                        services.</span>
                </div>
                <div class="separator"></div>

                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                    <div class="flex-root d-flex flex-column">
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Mr no:</span>
                            <span class="">{{ $lab_appointments->mr_no }}</span>
                        </div>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Patient Name :</span>
                            <span class="">{{ $lab_appointments->users->firstname }}</span>
                        </div>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Age :</span>
                            <span class="">{{ $lab_appointments->users->age }}</span>
                        </div>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Gender :</span>
                            <span class="">{{ $lab_appointments->users->gender }}</span>
                        </div>
                    </div>


                    <div class="flex-root d-flex flex-column">
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Phone :</span>
                            <span class="">{{ $lab_appointments->users->phone_no }}</span>
                        </div>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Address :</span>
                            <span class="">{{ $lab_appointments->users->address }}</span>
                        </div>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Created Date :</span>
                            <span class="">{{ $lab_appointments->formatted_created_at }}</span>
                        </div>

                    </div>
                </div>
                <!--end::Patient Information-->
                <div class="fw-bold fs-2">Test Details<br>
                </div>
                <div class="d-flex justify-content-between flex-column">
                    <!--begin::Table-->
                    <div class="table-responsive border-bottom mb-9">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                            <thead>
                                <tr class="border-bottom fs-6 fw-bold text-muted ">
                                    <th class="min-w-70px  pb-2 pt-0">Sno</th>
                                    <th class="min-w-70px pb-2 pt-0">Test</th>
                                    <th class="min-w-80px  pb-2 pt-0">Discount</th>
                                    <th class="min-w-70px   pb-2 pt-0">Amount</th>
                                </tr>
                            </thead>

                            <tbody class="fw-semibold text-gray-600">
                                @php
                                    $count = 1;
                                    $subtotal = 0;
                                    $totalDiscount = 0;
                                    $GrandTotal = 0;
                                @endphp
                                @foreach ($lab_appointments->lab_details as $lab_detail)
                                    <tr class="m-5">
                                        <td style="padding: 23px 1px;">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="">
                                            {{ $lab_detail->lab_test->labortary_test }}
                                        </td>
                                        <td class="">
                                            {{ @$lab_detail->discount }}


                                        </td>
                                        <td class="">
                                            {{ $lab_detail->amount }}
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <th class="min-w-70px  pb-2">S.no</th>
                                <th class="min-w-175px  pb-2">Tests</th>
                                <th class="min-w-80px  pb-2">Unit</th>
                                <th class="min-w-80px  pb-2">Range</th>
                                <th class="min-w-80px  pb-2">Result</th> --}}
                                <tr>
                                    <td colspan="3" class="">
                                        Total Amount: {{ $lab_appointments->main_total }}
                                    </td>
                                    <td class="text-end">
                                        {{--  spacing purpose --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="">
                                        Total Discount: {{ $lab_appointments->total_discount }}
                                    </td>
                                    <td class="text-end">
                                        {{--  spacing purpose --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="fs-3 text-gray-900 fw-bold ">
                                        Grand Total: Rs. {{ $lab_appointments->total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!-- end::Wrapper-->
</div>
<!--end::Card body-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Custom Javascript(used for this page only)-->
{{-- <script src="{{asset('assets') }}/js/custom/apps/ecommerce/catalog/save-product.js"></script> --}}
<script src="{{ asset('assets') }}/js/widgets.bundle.js"></script>
<script src="{{ asset('assets') }}/js/custom/widgets.js"></script>
<script src="{{ asset('assets') }}/js/custom/apps/chat/chat.js"></script>
{{-- <script src="{{ asset('asset-js') }}/js/custom.js"></script> --}}

<script src="{{ asset('asset-js') }}/js/jquery.form.js"></script>
<script src="{{ asset('asset-js') }}/js/select2.min.js"></script>
<script src="{{ asset('asset-js') }}/js/parsley.min.js"></script>
<script src="{{ asset('asset-js') }}/js/sweetalert2.min.js"></script>
<script src="{{ asset('asset-js') }}/js/custom.js"></script>
<script src="{{ asset('asset-js') }}/js/plugins/lord-icon-2.1.0.js"></script>
