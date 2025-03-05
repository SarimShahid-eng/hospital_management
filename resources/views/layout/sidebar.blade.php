<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <div class=" ">
            <a href="{{ route('home') }}" class="d-flex p-0 m-0 text-decoration-none text-white">
                <img alt="Logo" src="{{ asset('assets') }}/logos/mks_updated_logo.png" style="width: 45px;"
                    class=" app-sidebar-logo-default" />
                <div class="text-wrapper ms-2">
                    <h3 class="text-white pb-1 m-0">MKS</h3>
                    <span class="text-white" style="font-size: 13px;">THE CARDIOLOGY CLINIC</span>
                </div>
            </a>
        </div>

    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6 text-light">
                    <!--begin:Menu item-->
                    {{-- @isPatient
                        <a href="{{ route('dashboard.index') }}" class="menu-item">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa fa-cube fa-2x"></i>
                                </span>
                                <span class="menu-title">Patient Dashboard</span>
                            </span>
                        </a>
                    @endisPatient --}}
                    @isReceptionist
                        <a href="{{ route('receptionist.dashboard.index') }}" class="menu-item">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa fa-cube fa-2x"></i>
                                </span>
                                <span class="menu-title">Receptionist Dashboard</span>
                            </span>
                        </a>
                    @endisReceptionist
                    {{-- @islabortarist
                        <a href="{{ route('labortarist.dashboard.index') }}" class="menu-item">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa fa-cube fa-2x"></i>
                                </span>
                                <span class="menu-title">Labortarist Dashboard</span>
                            </span>
                        </a>
                    @endislabortarist --}}
                    @isDoctor
                        <a href="{{ route('doctor.dashboard.index') }}" class="menu-item">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa fa-cube fa-2x"></i>
                                </span>
                                <span class="menu-title">Doctor Dashboard</span>
                            </span>
                        </a>
                    @endisDoctor
                    @isAdmin
                        <a href="{{ route('admin.dashboard.index') }}" class="menu-item here">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i>
                                </span>
                                <span class="menu-title">Dashboards</span>
                            </span>
                        </a>
                    @endisAdmin
                </div>

                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <div class="menu-item pt-5"><!--begin:Menu content-->
                        <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Users</span>
                        </div>
                        <!--end:Menu content-->
                    </div><!--end:Menu item--><!--begin:Menu item-->
                    {{-- @if ($route == 'admin') --}}
                    @exceptThisAuth('web')
                        <div data-kt-menu-trigger="click" class="menu-item  show menu-accordion">
                            <a href="{{ route(admin_route('patients.list')) }}" class="menu-item">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="fa fa-cube fa-2x">
                                        </i>
                                    </span>
                                    <span class="menu-title">All Patients</span>
                                </span>
                            </a>
                        </div>
                    @endexceptThisAuth
                    @isAdmin
                        <div data-kt-menu-trigger="click" class="menu-item  show menu-accordion">
                            <a href="{{ route('admin.branch.index') }}" class="menu-item">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="fa fa-cube fa-2x">
                                        </i>
                                    </span>
                                    <span class="menu-title">Branch</span>
                                </span>
                            </a>
                        </div>
                    @endisAdmin
                    @exceptThisAuth('web')
                        <div data-kt-menu-trigger="click" class="menu-item   menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Reception</span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                @hasAnyAuth('admin', 'receptionist')
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <a class="menu-link active" href="{{ route(admin_route('appointment.index')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Patient
                                                Registration</span></a>
                                    </div>
                                @endhasAnyAuth
                                <!--end:Menu item-->
                                @exceptThisAuth('web')
                                    <div class="menu-item"><a class="menu-link"
                                            href="{{ route(admin_route('appointment.list')) }}"><span class="menu-bullet"><span
                                                    class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Appointments</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                @endexceptThisAuth

                                {{-- @exceptThisAuth --}}
                                @hasAnyAuth('admin', 'receptionist')
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('appointment.pending_appointment')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Pending Appointments</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('appointment.cancel_appointment_list')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Cancelled Appointments</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                @endhasAnyAuth


                            </div><!--end:Menu sub-->
                        </div>
                    @endexceptThisAuth


                    @hasAnyAuth('admin')
                        <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Admins</span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->


                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link active"
                                        href="{{ route(admin_route('admin.index')) }}"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">Add
                                            Admin</span></a><!--end:Menu link--></div>
                                <!--end:Menu item--><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="{{ route(admin_route('admin.list')) }}"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span
                                            class="menu-title">List</span></a><!--end:Menu link-->
                                </div><!--end:Menu item--><!--begin:Menu item-->


                            </div><!--end:Menu sub-->
                        </div>
                    @endhasAnyAuth
                    @hasAnyAuth('admin')
                        <div data-kt-menu-trigger="click" class=" menu-item   menu-accordion">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Doctors</span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->


                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link active"
                                        href="{{ route(admin_route('doctor.index')) }}"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">Add
                                            Doctor</span></a><!--end:Menu link--></div>
                                <!--end:Menu item--><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="{{ route(admin_route('doctor.list')) }}"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span
                                            class="menu-title">List</span></a><!--end:Menu link-->
                                </div><!--end:Menu item--><!--begin:Menu item-->


                            </div><!--end:Menu sub-->
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item   menu-accordion">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Receptionists</span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->


                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link active"
                                        href="{{ route(admin_route('receptionist.index')) }}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Add Receptionist</span></a><!--end:Menu link-->
                                </div>
                                <!--end:Menu item--><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="{{ route(admin_route('receptionist.list')) }}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">List</span></a><!--end:Menu link-->
                                </div><!--end:Menu item--><!--begin:Menu item-->



                            </div><!--end:Menu sub-->
                        </div>
                        {{-- labortarist --}}
                        {{-- <div data-kt-menu-trigger="click" class="menu-item   menu-accordion">
                            <span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Labortarists</span><span class="menu-arrow"></span></span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link active"
                                        href="{{ route(admin_route('labortarist.index')) }}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Add Labortarist</span>
                                    </a>
                                </div>
                                <div class="menu-item"><a class="menu-link"
                                        href="{{ route(admin_route('labortarist.list')) }}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">List</span></a>
                                </div>
                            </div>
                        </div> --}}
                    @endhasAnyAuth
                    {{-- all can see labortary only test result manage is available for doctor  --}}
                    @hasAnyAuth('admin', 'receptionist', 'doctor', 'web')
                        <div data-kt-menu-trigger="click" class="menu-item   menu-accordion">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-icon">
                                    <i class="fa fa-cube fa-2x">

                                    </i><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i></span><span
                                    class="menu-title">Labortary</span><span class="menu-arrow"></span></span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                                @hasAnyAuth('admin', 'receptionist')
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link active"
                                            href="{{ route(admin_route('labortary.index')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Add a Test</span></a><!--end:Menu link--></div>
                                    <!--end:Menu item--><!--begin:Menu item-->
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('labortary.list')) }}"><span class="menu-bullet"><span
                                                    class="bullet bullet-dot"></span></span><span
                                                class="menu-title">Test/subtest List</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                @endhasAnyAuth
                                @hasAnyAuth('admin', 'receptionist', 'doctor', 'web')
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('labortary.test_result_manage')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">
                                                Test Result Manage</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                @endhasAnyAuth
                                @hasAnyAuth('admin', 'receptionist')
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('labortary.patient_test')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">
                                                Patient Test list</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                            href="{{ route(admin_route('labortary.cancel_patient_test')) }}"><span
                                                class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                                class="menu-title">
                                                Cancelled Test Patient</span></a><!--end:Menu link-->
                                    </div><!--end:Menu item--><!--begin:Menu item-->
                                @endhasAnyAuth
                            </div><!--end:Menu sub-->


                        </div>
                    @endhasAnyAuth



                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->

    <!--end::Footer-->
</div>
<!--end::Sidebar-->
