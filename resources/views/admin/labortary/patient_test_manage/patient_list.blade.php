@extends('layout.index')
<style>
    /* // select2 css started */
    .select2-result-repository {
        padding-top: 4px;
        padding-bottom: 3px;
    }

    .select2-results__option[aria-selected] {
        cursor: pointer;
    }

    .select2-result-repository__avatar {
        float: left;
        width: 60px;
        margin-right: 10px;
    }

    .select2-result-repository__meta {
        margin-left: 70px;
    }

    .select2-results__option--highlighted .select2-result-repository__title {
        color: #595e72;
    }

    .select2-result-repository__title {
        font-size: 16px;
        font-weight: 600;
        word-wrap: break-word;
        line-height: 1.1;
        margin-bottom: 4px;
    }

    .select2-results__option--highlighted .select2-result-repository__description,
    .select2-results__option--highlighted .select2-result-repository__forks,
    .select2-results__option--highlighted .select2-result-repository__stargazers,
    .select2-results__option--highlighted .select2-result-repository__watchers {
        color: #c1d7e9;
    }

    .select2-result-repository__forks,
    .select2-result-repository__stargazers,
    .select2-result-repository__watchers {
        display: inline-block;
        /* color: #aaa; */
        font-weight: 400 !important;
        /* font-weight: 700; */
        font-size: 11px;
    }

    .select2-result-repository__forks,
    .select2-result-repository__stargazers,
    .select2-result-repository__watchers {
        margin-right: 1em;
    }
</style>
@section('content')
    @include('admin.labortarist.modal')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card-body py-4">
            <div class="col-md-10 mx-auto">
                <label class="form-label" for="">Test search (Enter Mobile
                    Number - Mr.no)</label>
                <select id="appointment_id" name="branch_id" class="form-select form-select-solid" data-kt-select2="true"
                    data-close-on-select="false" data-placeholder="Select option" data-allow-clear="true">
                    <option></option>
                </select>
            </div>
            <hr>
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
                    <div class="col-md-4">
                        <label class="form-label" for="">From Date</label>
                        <input type="date" class="from_date form-control form-control-solid">
                    </div>
                    <div class="col-md-4">
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

            <div id="kt_table_users_wrapper " class="mt-4 dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users"
                        style="width: 877.5px;">
                        <colgroup>
                            <col style="width: 36.3984px;">
                            <col style="width: 163.102px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;">
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
                                        class="dt-column-title" role="button">Mr.no</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Name</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Branch</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Appoint.date</span><span
                                        class="dt-column-order"></span>
                                </th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                    rowspan="1" colspan="1" aria-label="User: Activate to sort" tabindex="0">
                                    <span class="dt-column-title" role="button">Payment receipt</span><span
                                        class="dt-column-order"></span>
                                </th>
                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1"
                                    colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span
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
                    $('.alertText').text('Are you sure you want to cancel the Test?');
                })

                let table = $('#kt_table_users').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: " @adminRoute('labortary.patient_test')",
                        data: function(d) {
                            d.from_date = $('.from_date').val(),
                                d.to_date = $('.to_date').val(),
                                d.search_supplier = $('#search-supplier').val(),
                                d.user_id = $('#appointment_id').val(),
                                d.dateFilter = $('#DateFilter').find('option:selected').text();
                        }
                    },

                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'mr_no',
                            data: 'mr_no'
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
                            data: 'appointment_date',
                            name: 'appointment_date'
                        },
                        {
                            data: 'payment_receipt',
                            name: 'payment_receipt'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },


                    ],
                    dom: 'flrtip',
                    columnDefs: [{
                        targets: [0, , 5, 6], // Columns 0 (id) and 6 (action)
                        className: 'no-export' // Apply class 'no-export' to exclude these columns
                    }],
                    initComplete: function() {
                        $('.dt-buttons').addClass('btn-group');
                    },
                    pageLength: 300,
                    lengthMenu: [
                        [300, 500, 1000, 1500],
                        [300, 500, 1000, 1500]
                    ]
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
                // select2 templates moved...
                @include('admin.patientsSelect2Template.patientsSelect2Template')

                $('#appointment_id').select2({
                    ajax: {
                        url: "@adminRoute('labortary.get_labappointment')",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                number: params.term // search term
                            };
                        },
                        processResults: function(data) {
                            let arr = [];
                            if (data.appointment && data.users !== null) {
                                arr = data['appointment'];
                            }
                            return {

                                results: $.map(arr, function(item) {
                                    console.log(item)
                                    var firstname = null;
                                    var id = null;
                                    var lastname = null;
                                    var mr_no = null;
                                    var phone_no = null;
                                    var receipt = null;
                                    var image = null;
                                    var branch = null;

                                    if (item.users.firstname) {
                                        id = item.users.id;
                                        firstname = item.users.firstname;
                                        lastname = item.users.username;
                                        image = item.users.image;
                                        phone_no = item.users.phone_no;
                                        mr_no = item.mr_no;
                                        branch = item.branch.name;
                                    }
                                    return {
                                        id: id,
                                        firstname: firstname,
                                        lastname: lastname,
                                        image: image,
                                        phone_no: phone_no,
                                        mr_no: mr_no,
                                        branch: branch

                                    };

                                })
                            };
                        },
                        cache: true
                    },
                    templateResult: formatUser,
                    templateSelection: formatUserSelection,
                    placeholder: 'Enter mobile number or mr no',
                    minimumInputLength: 10,
                    language: {
                        inputTooShort: function(args) {
                            var remainingChars = 10 - args.input.length;
                            if (args.input.length >= 6) {
                                return 'Enter ' + remainingChars + ' more character' + (remainingChars > 1 ?
                                    's' : '');
                            } else {
                                return 'Enter mobile number or mr no';
                            }
                        },

                        noResults: function() {
                            return "No results found";
                        }
                    }
                });
                $('.from_date , .to_date,#appointment_id,#DateFilter').change(function() {
                    table.draw();
                })

            })
        </script>
    @endpush
@endsection
