@extends('layout.index')

<head>
    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
@section('content')
@include('admin.services.modal')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Modal - Customers - Add-->

        <!--end::Modal - Customers - Add--><!--begin::Modal - Adjust Balance-->
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_customer" id="addBranch">

                            <i style="padding-bottom: 1px;" class="fa fa-plus"></i> Add Service
                        </button>

                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">


                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                        </div>

                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                            Delete Selected
                        </button>
                    </div>
                    <!--end::Group actions-->

                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Card header-->

            <!--begin::Card body-->

            <div class="card-body py-4">

                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                    <div id="" class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 " id="ServiceData"
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

                                    <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                        rowspan="1" colspan="1" aria-label="User: Activate to sort"
                                        tabindex="0">
                                        <span class="dt-column-title" role="button">Sno</span><span
                                            class="dt-column-order"></span>
                                    </th>
                                    <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2"
                                        rowspan="1" colspan="1" aria-label="User: Activate to sort"
                                        tabindex="0">
                                        <span class="dt-column-title" role="button">Service name</span><span
                                            class="dt-column-order"></span>
                                    </th>
                                    <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="2"
                                        rowspan="1" colspan="1" aria-label="User: Activate to sort"
                                        tabindex="0">
                                        <span class="dt-column-title" role="button">Branch name</span><span
                                            class="dt-column-order"></span>
                                    </th>


                                    <th class="min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1"
                                        colspan="1" aria-label="Actions"><span
                                            class="dt-column-title">Actions</span><span class="dt-column-order"></span>
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
        <!--end::Card-->
    </div>
    @push('scripts')
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                // alert($('#branch_id').val())
                $('#branch').select2({
                    placeholder: "Select an option",
                    allowClear: true,
                    dropdownParent: $('#kt_modal_add_customer'),
    });

                $(document).on('click', '.delete', function() {

                    var delete_url = $(this).data('url')
                    $('.delete_notify').attr('data-url', delete_url)
                })
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).on('click', '#addBranch', function() {
                    $('#branch').val(null).trigger('change');
                    $('#kt_modal_add_customer').find('input[type="text"]').val('');
                })

                $(document).on('click', '.editModal', function() {
                    var currentId = $(this).attr('data-id');

                    $.ajax({
                        url: "{{ route('admin.service.edit') }}",
                        dataType: 'json',
                        data: {
                            currentId: currentId
                        },
                        success: function(response) {
                            console.log(response)
                            $('#kt_modal_add_customer').modal('show')
                            $('#service_name').val(response.name)
                            $('#update_id').val(response.id)
                            $('#branch').val(response.branch_id).trigger('change');
                        },
                        error: function(xhr, textStatus, errorThrown) {

                            console.log('AJAX Error:', errorThrown);
                            console.log('Response Body:', xhr.responseText);

                        }

                    })
                })

                $('#ServiceData').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: "{!! route('admin.service.list') !!}",
                    columns: [{
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
                            data: 'action',
                            name: 'action'
                        },
                    ],
                    dom: '<"custom-container"<"show-entries"l><"search-input"f>>tipr'
                });
            })
        </script>
    @endpush
@endsection
