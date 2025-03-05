@extends('layout.index')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">


        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <div class="row g-xxl-9">
                    <!--begin::Col-->
                    <div class="col-xxl-8">
                        <!--begin::Security summary-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header card-header-stretch">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h3 class="m-0 text-gray-900">Patient Details</h3>
                                </div>
                                <!--end::Title-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch border-transparent fs-5 fw-bold"
                                        id="kt_security_summary_tabs">
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary active" data-kt-countup-tabs="true"
                                                data-bs-toggle="tab" href="#GeneralInfos">
                                                General Info</a>
                                        </li>

                                        {{-- <li class="nav-item">
                                            <a class="nav-link text-active-primary" data-kt-countup-tabs="true"
                                                data-bs-toggle="tab" id="FollowUpsTab" href="#FollowUps">Follow Ups</a>
                                        </li> --}}

                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary" data-kt-countup-tabs="true"
                                                data-bs-toggle="tab" id="consultantTab" href="#consultant">Consultant</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary" data-kt-countup-tabs="true"
                                                data-bs-toggle="tab" id="consultantTab" href="#labTest">Lab Test</a>
                                        </li>

                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-0 pb-0 px-0">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab panel-->
                                    <div class="tab-pane fade active show" id="GeneralInfos" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="card mb-5 mb-xl-10" style="border:0; box-shadow:none;">
                                            <!--begin::Card header-->
                                            <div class="card-header ">
                                                <!--begin::Heading-->
                                                <div class="card-title text-center">
                                                    <h3>General Info</h3>
                                                </div>
                                                <!--end::Heading-->

                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body ">
                                                <!--begin::Table wrapper-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                        {{-- @foreach ($users as $u) --}}
                                                        {{-- @if ($loop->iteration === 1) --}}
                                                        <thead class="border-gray-200">
                                                            <tr>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    Full Name</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#firstname"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $user->firstname ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    Mr#</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#mr_no"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $mr_no ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    Gender</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#gender"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $user->gender ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    Phone</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#phone_no"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $user->phone_no ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    CNIC</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#cnic"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $user->cnic_no ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                                <th class="min-w-250px fs-5 fw-semibold bg-lighten">
                                                                    Date of Birth</th>
                                                                <td class="min-w-100px">
                                                                    <a href="#dob"
                                                                        class="text-hover-primary text-gray-600">
                                                                        {{ $user->dob ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>

                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table wrapper-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                    <!--end::Tab panel-->
                                    {{-- follow ups backup --}}
                                    {{-- <div class="tab-pane fade" id="FollowUps" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="card mb-5 mb-xl-10" style="border:0;">
                                            <!--begin::Card header-->
                                            <div class="card-header ">
                                                <!--begin::Heading-->
                                                <div class="card-title text-center">
                                                    <h3>Follow Ups</h3>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body p-0">
                                                <!--begin::Table wrapper-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                        <!--begin::Thead-->
                                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                            <tr>
                                                                <th class="min-w-250px">Location</th>
                                                                <th class="min-w-100px">Status</th>
                                                                <th class="min-w-150px">Device</th>
                                                                <th class="min-w-150px">IP Address</th>
                                                                <th class="min-w-150px">Time</th>
                                                            </tr>
                                                        </thead>
                                                        <!--end::Thead-->

                                                        <!--begin::Tbody-->
                                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="text-hover-primary text-gray-600">USA(5)</a>
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                                </td>

                                                                <td>Chrome - Windows</td>

                                                                <td>236.125.56.78</td>

                                                                <td>2 mins ago</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="text-hover-primary text-gray-600">United
                                                                        Kingdom(10)</a>
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                                </td>

                                                                <td>Safari - Mac OS</td>

                                                                <td>236.125.56.78</td>

                                                                <td>10 mins ago</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="text-hover-primary text-gray-600">Norway(-)</a>
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                                                                </td>

                                                                <td>Firefox - Windows</td>

                                                                <td>236.125.56.10</td>

                                                                <td>20 mins ago</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="text-hover-primary text-gray-600">Japan(112)</a>
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                                </td>

                                                                <td>iOS - iPhone Pro</td>

                                                                <td>236.125.56.54</td>

                                                                <td>30 mins ago</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="text-hover-primary text-gray-600">Italy(5)</a>
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                                                                </td>

                                                                <td>Samsung Noted 5- Android</td>

                                                                <td>236.100.56.50</td>

                                                                <td>40 mins ago</td>
                                                            </tr>

                                                        </tbody>
                                                        <!--end::Tbody-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table wrapper-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div> --}}
                                    <!--end::Tab panel-->
                                    <div class="tab-pane fade" id="consultant" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="card mb-5 mb-xl-10" style="border:0; box-shadow:none;">
                                            <!--begin::Card header-->
                                            <div class="card-header ">
                                                <div class="card-title text-center">
                                                    <h3>Consultant</h3>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                            <tr>
                                                                <th class="min-w-250px">Sno</th>
                                                                <th class="min-w-100px">Name</th>
                                                                <th class="min-w-150px">Mr#</th>
                                                                <th class="min-w-150px">Doctor</th>
                                                                <th class="min-w-150px">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <!--begin::Tbody-->
                                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                                            @foreach ($user_appointments as $appointment)
                                                                <tr>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $loop->iteration }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $appointment->users->firstname }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $appointment->mr_no }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ @$appointment->appointment_details->doctors->firstname }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $appointment->appointment_date }}</span>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <!--end::Tbody-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table wrapper-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab panel-->
                                    <div class="tab-pane fade" id="labTest" role="tabpanel">
                                        <!--begin::Row-->
                                        <div class="card mb-5 mb-xl-10" style="border:0; box-shadow:none;">
                                            <!--begin::Card header-->
                                            <div class="card-header ">
                                                <div class="card-title text-center">
                                                    <h3>Lab Test</h3>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                            <tr>
                                                                <th class="min-w-100px">Sno</th>
                                                                <th class="min-w-100px">Name</th>
                                                                <th class="min-w-150px">Mr#</th>
                                                                <th class="min-w-150px">Test Name</th>
                                                                {{-- <th class="min-w-150px">Date</th> --}}

                                                                {{-- <th class="min-w-150px">Reference</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <!--begin::Tbody-->
                                                        <tbody class="fw-6 fw-semibold text-gray-600">
                                                            @forelse ($lab_details as $lab_detail)
                                                                <tr>
                                                                    {{-- @dd($lab_detail->lab_) --}}
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $loop->iteration }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ @$lab_detail->lab_app->users->firstname }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ @$lab_detail->lab_app->mr_no }}</span>
                                                                    </td>
                                                                    {{-- <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ @$appointment->appointment_details->doctors->firstname }}</span>
                                                                    </td> --}}
                                                                    <td>
                                                                        <span
                                                                            class="text-hover-primary text-gray-600">{{ $lab_detail->lab_test->labortary_test }}</span>
                                                                    </td>

                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="10">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center">
                                                                            <h4 class="m-0 me-2" style="color:#f8285a;">No
                                                                                Lab Test Has
                                                                                Been Found</h4>
                                                                            <i style="color:#f8285a; font-size:30px;"
                                                                                class="fa-solid fa-vial"></i>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforelse

                                                        </tbody>
                                                        <!--end::Tbody-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table wrapper-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Tab panel-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Security summary-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->


                <!--begin::Login sessions-->
                {{-- <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Heading-->
                        <div class="card-title">
                            <h3>Login Sessions</h3>
                        </div>
                        <!--end::Heading-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <select class="form-select form-select-sm form-select-solid w-125px"
                                    data-control="select2" data-placeholder="Select Hours" data-hide-search="true">
                                    <option value="1" selected>1 Hours</option>
                                    <option value="2">6 Hours</option>
                                    <option value="3">12 Hours</option>
                                    <option value="4">24 Hours</option>
                                </select>
                                <!--end::Select-->
                            </div>

                            <a href="#" class="btn btn-sm btn-primary my-1">
                                View All
                            </a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body p-0">
                        <!--begin::Table wrapper-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="min-w-250px">Location</th>
                                        <th class="min-w-100px">Status</th>
                                        <th class="min-w-150px">Device</th>
                                        <th class="min-w-150px">IP Address</th>
                                        <th class="min-w-150px">Time</th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->

                                <!--begin::Tbody-->
                                <tbody class="fw-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                        </td>

                                        <td>Chrome - Windows</td>

                                        <td>236.125.56.78</td>

                                        <td>2 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600">United
                                                Kingdom(10)</a>
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                        </td>

                                        <td>Safari - Mac OS</td>

                                        <td>236.125.56.78</td>

                                        <td>10 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
                                        </td>

                                        <td>
                                            <span class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                                        </td>

                                        <td>Firefox - Windows</td>

                                        <td>236.125.56.10</td>

                                        <td>20 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                        </td>

                                        <td>iOS - iPhone Pro</td>

                                        <td>236.125.56.54</td>

                                        <td>30 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
                                        </td>

                                        <td>
                                            <span class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                                        </td>

                                        <td>Samsung Noted 5- Android</td>

                                        <td>236.100.56.50</td>

                                        <td>40 mins ago</td>
                                    </tr>

                                </tbody>
                                <!--end::Tbody-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                    <!--end::Card body-->
                </div> --}}
                <!--end::Login sessions-->


                <!--begin::License usage-->
                {{-- <div class="card ">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Heading-->
                        <div class="card-title">
                            <h3>License Usage</h3>
                        </div>
                        <!--end::Heading-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <select class="form-select form-select-sm form-select-solid w-125px"
                                    data-control="select2" data-placeholder="Select Hours" data-hide-search="true">
                                    <option value="1">1 Hours</option>
                                    <option value="2">6 Hours</option>
                                    <option value="3" selected>12 Hours</option>
                                    <option value="4">24 Hours</option>
                                </select>
                                <!--end::Select-->
                            </div>

                            <a href="#" class="btn btn-sm btn-primary my-1">
                                Download Report
                            </a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body p-0">
                        <!--begin::Table wrapper-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered table-row-solid gy-4"
                                id="kt_security_license_usage_table">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="w-150px ps-9">Status</th>
                                        <th class="px-0 min-w-250px">Operator</th>
                                        <th class="min-w-150px">IP Address</th>
                                        <th class="min-w-150px">Created</th>
                                        <th class="pe-0 min-w-150px">API Keys</th>
                                        <th class="min-w-50px"></th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->

                                <!--begin::Tbody-->
                                <tbody class="fw-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">DSI: Workstation
                                                2</a>
                                        </td>

                                        <td>236.125.56.78</td>

                                        <td>2 mins ago</td>

                                        <td data-bs-target="license">fftt456765gjkkjhi8306767</td>

                                        <td class="ps-5">
                                            <button type="button" data-action="copy"
                                                class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-">
                                                <i class="ki-duotone ki-copy fs-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">ReXe: Workstation
                                                29</a>
                                        </td>

                                        <td>236.125.56.78</td>

                                        <td>3 mins ago</td>

                                        <td data-bs-target="license">none</td>

                                        <td class="ps-5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">RamenLC:
                                                Workstation 2</a>
                                        </td>

                                        <td>654.125.56.34</td>

                                        <td>5 mins ago</td>

                                        <td data-bs-target="license">ertt456765gjkkjhi83034344</td>

                                        <td class="ps-5">
                                            <button type="button" data-action="copy"
                                                class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-">
                                                <i class="ki-duotone ki-copy fs-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">Nest Five:
                                                Workstation 86</a>
                                        </td>

                                        <td>423.125.56.54</td>

                                        <td>1 mins ago</td>

                                        <td data-bs-target="license">dctt456765gjkkjhi83093985</td>

                                        <td class="ps-5">
                                            <button type="button" data-action="copy"
                                                class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-">
                                                <i class="ki-duotone ki-copy fs-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">DSI: Workstation
                                                2</a>
                                        </td>

                                        <td>236.125.56.78</td>

                                        <td>7 mins ago</td>

                                        <td data-bs-target="license">none</td>

                                        <td class="ps-5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">ReXe: Workstation
                                                7</a>
                                        </td>

                                        <td>745.234.56.21</td>

                                        <td>3 mins ago</td>

                                        <td data-bs-target="license">uytt456765gjkkjhi4312673</td>

                                        <td class="ps-5">
                                            <button type="button" data-action="copy"
                                                class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-">
                                                <i class="ki-duotone ki-copy fs-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-9">
                                            <span class="badge badge-light-warning fs-7 fw-bold">To be Paid</span>
                                        </td>

                                        <td class="ps-0">
                                            <a href="#" class="text-hover-primary text-gray-600">Swedline:
                                                Workstation 54</a>
                                        </td>

                                        <td>441.967.56.54</td>

                                        <td>8 mins ago</td>

                                        <td data-bs-target="license">ygd456765gjkkjhi83095427</td>

                                        <td class="ps-5">
                                            <button type="button" data-action="copy"
                                                class="btn btn-active-color-primary btn-icon btn-color-gray-500 btn-sm btn-outline-light d-">
                                                <i class="ki-duotone ki-copy fs-2"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                                <!--end::Tbody-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                    <!--end::Card body-->
                </div> --}}
                <!--end::License usage-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Content wrapper-->
@endsection
