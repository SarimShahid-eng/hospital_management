@extends('layout.index')
@section('content')
    @include('admin.labortarist.modal')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card-body py-4">

            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
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
                                        class="dt-column-title" role="button">Lab Test</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">name</span><span
                                        class="dt-column-order"></span></th>

                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Actions</span><span
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
                    ajax: " @adminRoute('labortary.list')",

                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'labortary_test',
                            name: 'labortary_test'
                        },
                        {
                            data: 'name',
                            name: 'name'
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
