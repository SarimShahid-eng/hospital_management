@extends('layout.index')
@section('content')
    @include('user.modal')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card-body py-4">

            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
                    <div class="fv-row mb-9 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-2 required">Event Start Date</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control form-control-solid flatpickr-input" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" type="text" readonly="readonly">
                        <!--end::Input-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users"
                        style="width: 877.5px;">
                        <colgroup>
                            <col style="width: 36.3984px;">
                            <col style="width: 163.102px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;">
                            {{-- <col style="width: 131.375px;">
                            <col style="width: 176.828px;">
                            <col style="width: 107.047px;"> --}}
                        </colgroup>
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">

                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Id</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Name</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Email</span><span
                                        class="dt-column-order"></span></th>

                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Actions</span><span
                                        class="dt-column-order"></span>
                                </th>
                            </tr>
                        </thead>

                    </table>
                </div>
                {{-- <div id="" class="row">
                    <div id=""
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar">
                    </div>
                    <div id=""
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dt-paging paging_simple_numbers">
                            <ul class="pagination">
                                <li class="dt-paging-button page-item disabled"><a class="page-link previous"
                                        aria-controls="kt_table_users" aria-disabled="true" aria-label="Previous"
                                        data-dt-idx="previous" tabindex="-1"><i class="previous"></i></a></li>
                                <li class="dt-paging-button page-item active"><a href="#" class="page-link"
                                        aria-controls="kt_table_users" aria-current="page" data-dt-idx="0"
                                        tabindex="0">1</a></li>
                                <li class="dt-paging-button page-item"><a href="#" class="page-link"
                                        aria-controls="kt_table_users" data-dt-idx="1" tabindex="0">2</a></li>
                                <li class="dt-paging-button page-item"><a href="#" class="page-link"
                                        aria-controls="kt_table_users" data-dt-idx="2" tabindex="0">3</a></li>
                                <li class="dt-paging-button page-item"><a href="#" class="page-link next"
                                        aria-controls="kt_table_users" aria-label="Next" data-dt-idx="next"
                                        tabindex="0"><i class="next"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.delete', function() {

                    var delete_url = $(this).data('url')
                    $('.delete_notify').attr('data-url', delete_url)
                })

                $('#kt_table_users').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: " @adminRoute('user.list')",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },

                        {
                            data: 'action',
                            name: 'action'
                        },

                    ],
                    // dom: '<"custom-container"<"show-entries"l><"search-input"f>>tipr'
                });
            })
        </script>
    @endpush
@endsection
