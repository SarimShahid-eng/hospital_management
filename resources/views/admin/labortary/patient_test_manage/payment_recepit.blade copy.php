<head>
    <title>Hospital Management | {{@$tittle}}</title>
    <meta charset="utf-8" />



    <link rel="canonical" href="finance-performance.html" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/media/logos/favicon.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    {{-- <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-js') }}/css/sweetalert2.min.css?{{date('d-m-Y')}}" rel="stylesheet" type="text/css" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

</head>
{{-- @section('content') --}}
<!--begin::Card body-->
<div class="card-body py-20">
    <!-- begin::Wrapper-->
    <div class="mw-lg-950px mx-auto w-100">
        <!-- begin::Header-->
        <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
            <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">Payment Receipt</h4>

            <!--end::Logo-->
            <div class="text-sm-end">
                <!--begin::Logo-->
                <a href="#" class="d-block mw-150px ms-sm-auto">
                    <img alt="Logo" src="{{asset('admin_asset')}}/assets/media/svg/brand-logos/lloyds-of-london-logo.svg" class="w-100">
                </a>
                <!--end::Logo-->

                <!--begin::Text-->
                <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                    <div>Cecilia Chapman, 711-2880 Nulla St, Mankato</div>

                    <div>Mississippi 96522</div>
                </div>
                <!--end::Text-->
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="pb-12">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column gap-7 gap-md-10">
                <!--begin::Message-->
                <div class="fw-bold fs-2">
                    Dear Lucy Kunic <span class="fs-6">(lucy.m@fentech.com)</span>,<br>
                    <span class="text-muted fs-5">Here are your payment details.Thank you for choosing our services.</span>
                </div>
                <!--begin::Message-->

                <!--begin::Separator-->
                <div class="separator"></div>
                <!--begin::Separator-->

                <!--begin::Order details-->
                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                    <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Order ID</span>
                        <span class="fs-5">#14534</span>
                        <div class="class" style="padding-top: 10px">
                        <span class="text-muted">Date</span>
                        <span class="fs-5">23 April, 2024</span>
                        </div>
                    </div>

                    <div class="flex-root d-flex flex-column">

                    </div>

                    <div class="flex-root d-flex flex-column">

                    </div>

                    <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Shipment ID</span>
                        <span class="fs-5">#SHP-0025410</span>
                        <div class="class" style="padding-top: 10px">
                            <span class="text-muted">Invoice ID</span>
                            <span class="fs-5">#INV-000414</span>
                        </div>
                    </div>
                </div>
                <!--end::Order details-->

                <!--begin::Billing & shipping-->
                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                    {{-- <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Billing Address</span>
                        <span class="fs-6">
                            Unit 1/23 Hastings Road,<br>
                            Melbourne 3000,<br>
                            Victoria,<br>
                            Australia.
                        </span>
                    </div> --}}
{{--
                    <div class="flex-root d-flex flex-column">
                        <span class="text-muted">Shipping Address</span>
                        <span class="fs-6">
                            Unit 1/23 Hastings Road,<br>
                            Melbourne 3000,<br>
                            Victoria,<br>
                            Australia.
                        </span>
                    </div> --}}
                </div>
                <!--end::Billing & shipping-->

                <!--begin:Order summary-->
                <div class="d-flex justify-content-between flex-column">
                    <!--begin::Table-->
                    <div class="table-responsive border-bottom mb-9">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                            <thead>
                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                    <th class="min-w-175px pb-2">Products</th>
                                    <th class="min-w-70px text-end pb-2">SKU</th>
                                    <th class="min-w-80px text-end pb-2">QTY</th>
                                    <th class="min-w-100px text-end pb-2">Total</th>
                                </tr>
                            </thead>

                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="../../ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(../../../assets/media/stock/ecommerce/1.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <!--begin::Title-->
                                            <div class="ms-5">
                                                <div class="fw-bold">Product 1</div>
                                                <div class="fs-7 text-muted">Delivery Date: 23/04/2024</div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        04122004                                        </td>
                                    <td class="text-end">
                                        2
                                    </td>
                                    <td class="text-end">
                                        $240.00
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="../../ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(../../../assets/media/stock/ecommerce/100.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <!--begin::Title-->
                                            <div class="ms-5">
                                                <div class="fw-bold">Footwear</div>
                                                <div class="fs-7 text-muted">Delivery Date: 23/04/2024</div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        03840006                                        </td>
                                    <td class="text-end">
                                        1
                                    </td>
                                    <td class="text-end">
                                        $24.00
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">
                                        Subtotal
                                    </td>
                                    <td class="text-end">
                                        $264.00
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">
                                        VAT (0%)
                                    </td>
                                    <td class="text-end">
                                        $0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">
                                        Shipping Rate
                                    </td>
                                    <td class="text-end">
                                        $5.00
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="fs-3 text-gray-900 fw-bold text-end">
                                        Grand Total
                                    </td>
                                    <td class="text-gray-900 fs-3 fw-bolder text-end">
                                        $269.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end:Order summary-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->


        <!-- end::Footer-->
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
 <script src="{{ asset('asset-js') }}/js/parsley.min.js" ></script>
 <script src="{{ asset('asset-js') }}/js/sweetalert2.min.js"></script>
 <script src="{{ asset('asset-js') }}/js/custom.js"></script>
 <script src="{{ asset('asset-js') }}/js/plugins/lord-icon-2.1.0.js"></script>
{{-- @endsection --}}
