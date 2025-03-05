@extends('layout.index')
@section('content')
    {{-- @include('admin.labortarist.modal') --}}
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
                            <col style="width: 131.375px;">
                            <col style="width: 163.102px;">
                            <col style="width: 131.375px;">
                            <col style="width: 131.375px;">
                            {{-- <col style="width: 131.375px;" />
                            <col style="width: 176.828px;"> --}}
                            {{-- <col style="width: 107.047px;"> --}}
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
                                        class="dt-column-title" role="button">appointment_date</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Status</span><span
                                        class="dt-column-order"></span></th>

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
                $(document).on('click', '.generator', function() {
                    var button=$(this)
                    var data_id = $(this).data('id');
                    var lab_detail_id=$(this).data('lab-id');
                    var data = {
                        id: data_id,
                        lab_detail_id:lab_detail_id
                    }
                    var url = "{{ route('admin.labortary.generate_test') }}"
                    // $(this).attr('disabled', true);
                    button.attr("disabled", 'disabled')
                    button.find('.spinner-border').show();
                    $('#modal_body').fadeOut(200, function() {
                        getAjaxRequests(url, data, 'GET', function(resp) {
                            // Update the modal content
                            $('#modal_body').empty().append(resp.html);

                            // Fade in the new content smoothly
                            $('#modal_body').fadeIn(200);

                            // Enable the button and hide the spinner

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

                $('#kt_table_users').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: "@adminRoute('labortary.cancel_patient_test')",
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
                            data: 'appointment_date',
                            name: 'appointment_date'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },



                    ],
                    // dom: '<"custom-container"<"show-entries"l><"search-input"f>>tipr'
                });
            })
        </script>
    @endpush
@endsection
