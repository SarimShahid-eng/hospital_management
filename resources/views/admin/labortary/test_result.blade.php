@extends('layout.index')
@section('content')
    {{-- @include('admin.labortarist.modal') --}}
    @include('admin.labortary.generate_result')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card-body py-4">
            <div class="row mb-3">

                <div class="col-md-2">
                    <label class="form-label">Export Option</label>
                    <!--begin::Label-->
                    <select id="exportOption" name="range_on" data-control="select2" data-hide-search="true"
                        class="form-select form-select-solid ">
                        <option value="">Export</option>
                        <option value="pdf">Pdf</option>
                        <option value="excel">Excel</option>
                        <option value="copy">Copy</option>
                        <option value="print">Print</option>
                    </select>
                </div>
                <div class="row col-md-8 justify-content-center">
                    <div class="col-lg-auto">
                        <label class="form-label">Status</label>
                        <!--begin::Label-->
                        <select id="statusFilter" name="range_on" data-control="select2" data-hide-search="true"
                            class="form-select form-select-solid ">
                            <option value="">Status</option>
                            <option value="">Pending</option>
                            <option value="pdf">Completed</option>
                        </select>
                    </div>
                    <div class="col-lg-auto col-md-auto">
                        <label class="form-label" for="">From Date</label>
                        <input type="date" class="from_date form-control form-control-solid">
                    </div>
                    <div class="col-lg-auto col-md-auto">
                        <label class="form-label" for="">To Date</label>
                        <input type="date" class="to_date form-control form-control-solid">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="">Filters</label>
                    <select id="DateFilter" data-control="select2" data-hide-search="true"
                        class="form-select form-select-solid ">
                        <option value="">All</option>
                        <option value="">Today</option>
                        <option value="">Yesterday</option>
                        <option value="">This Week</option>
                        <option value="">This Month</option>
                    </select>
                    {{-- <input type="date" class="to_date form-control form-control-solid"> --}}
                </div>
            </div>
            <!--begin::Table-->

            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users"
                        style="width: 877.5px;">
                        <colgroup>
                            <col style="width: 36.3984px;">
                            <col style="width: 131.375px;">
                            <col style="width: 163.102px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;" />
                            <col style="width: 176.828px;">
                            <col style="width: 107.047px;">
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
                                        class="dt-column-title" role="button">Branch</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Services</span><span
                                        class="dt-column-order"></span></th>

                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Test Date</span><span
                                        class="dt-column-order"></span>
                                </th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Status</span><span
                                        class="dt-column-order"></span>
                                </th>
                                @exceptThisAuth('web', 'doctor')
                                    <h5 class="text-danger"> {{ 'True' }}</h5>
                                    <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                        rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                        <span class="dt-column-title" role="button">Generate Result</span><span
                                            class="dt-column-order"></span>
                                    </th>
                                @endexceptThisAuth
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Test Result</span><span
                                        class="dt-column-order"></span>
                                </th>

                            </tr>
                        </thead>

                    </table>
                </div>

            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @push('scripts')
        {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                let targets = [0, 6];
                let columns = [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'services',
                        name: 'services'
                    },
                    {
                        data: 'appointment_date',
                        name: 'appointment_date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                ];

                @exceptThisAuth('web', 'doctor')
                columns.push({
                    data: 'generate_result',
                    name: 'generate_result'
                });
                targets = [0, 6, 7];
                @endexceptThisAuth
                columns.push({
                    data: 'result',
                    name: 'result'
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on('click', '.generator', function() {
                    var button = $(this)
                    var data_id = $(this).data('id');
                    var lab_detail_id = $(this).data('lab-id');
                    var data = {
                        id: data_id,
                        lab_detail_id: lab_detail_id
                    }
                    var url = "{{ route(admin_route('labortary.generate_test')) }}"
                    // $(this).attr('disabled', true);
                    button.attr("disabled", 'disabled')
                    button.find('.spinner-border').show();
                    $('#modal_body').fadeOut(200, function() {
                        getAjaxRequests(url, data, 'GET', function(resp) {
                            // Update the modal content
                            $('#modal_body').empty().append(resp.html);

                            // Fade in the new content smoothly
                            $('#modal_body').fadeIn(200);
                            button.removeAttr("disabled");
                            button.find('.spinner-border').hide();
                            // Show the modal after a slight delay
                            setTimeout(function() {
                                $('#generate_result').modal('show');
                            }, 300); // Adjust delay as needed
                        });

                    });
                })

                $(document).on('click', '.delete', function() {

                    var delete_url = $(this).data('url')
                    $('.delete_notify').attr('data-url', delete_url)
                })

                let table = $('#kt_table_users').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: "@adminRoute('labortary.test_result_manage')",
                        data: function(d) {
                            d.from_date = $('.from_date').val(),
                                d.to_date = $('.to_date').val(),
                                d.dateFilter = $('#DateFilter').find('option:selected').text();
                            d.statusFilter = $('#statusFilter').find('option:selected').text()
                        }
                    },
                    dom: 'flrtip',
                    pageLength: 300,
                    lengthMenu: [
                        [-1, 300, 500, 1000, 1500],
                        ['All', 300, 500, 1000, 1500]
                    ],
                    columnDefs: [{
                        targets: targets,
                        className: 'no-export' // Apply class 'no-export' to exclude these columns
                    }],
                    columns: columns,
                    // dom: '<"custom-container"<"show-entries"l><"search-input"f>>tipr'
                });

                $('#exportOption').on('change', function() {
                    let exportTable = new $.fn.dataTable.Buttons(table, {
                        buttons: [{
                                extend: 'copy',
                                className: 'buttons-copy',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                },
                            },
                            {
                                extend: 'excel',
                                className: 'buttons-excel',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                },
                            },
                            {
                                extend: 'pdf',
                                className: 'buttons-pdf',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                },
                            },
                            {
                                extend: 'print',
                                className: 'buttons-print',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)' // Exclude columns with 'no-export' class
                                },
                            },

                        ],



                    });
                    let selectedOption = $(this).find('option:selected').val();
                    if (selectedOption === 'copy') {
                        exportTable.container().find('.buttons-copy').click();
                    } else if (selectedOption === 'excel') {
                        exportTable.container().find('.buttons-excel').click();
                    } else if (selectedOption === 'pdf') {
                        exportTable.container().find('.buttons-pdf').click();
                    } else if (selectedOption === 'print') {
                        exportTable.container().find('.buttons-print').click();
                    }
                })

                $('#statusFilter,#DateFilter,.from_date,.to_date').change(function() {
                    table.draw();
                })
            })
        </script>
    @endpush
@endsection
