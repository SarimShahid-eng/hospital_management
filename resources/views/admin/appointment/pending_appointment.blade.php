@extends('layout.index')
@section('content')
    @include('admin.appointment.modal')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card-body py-4">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label for="">From Date</label>
                    <input type="date" class="from_date form-control form-control-solid">
                </div>
                <div class="col-md-4">
                    <label for="">To Date</label>
                    <input type="date" class="to_date form-control form-control-solid">
                </div>
            </div>



            <!--begin::Table-->
            <div id="kt_table_users_wrapper " class="mt-3 dt-container dt-bootstrap5 dt-empty-footer">
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
                                        class="dt-column-title" role="button">#Mr no</span><span
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
                                        class="dt-column-title" role="button">Appoint.Date</span><span
                                        class="dt-column-order"></span></th>


                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Payment.receipt</span><span
                                        class="dt-column-order"></span>
                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Pending/Active</span><span
                                        class="dt-column-order"></span>
                                    {{-- <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Actions</span><span
                                        class="dt-column-order"></span> --}}
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

                function changeStatus(obj) {
                    var arr = {
                        id: obj
                    }
                    var url = "{{ route(admin_route('appointment.change_status')) }}"
                    getAjaxRequests(url, arr, 'GET', function(resp) {
                        if (resp['reload'] !== undefined) {
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 400);
                            return false;
                        }
                        if (resp['redirect'] !== undefined) {
                            setTimeout(function() {
                                window.location = data['redirect'];
                            }, 400);
                            return false;
                        }


                    })
                }
                $(document).on('click', '.pending', function() {
                    var pending_id = $(this).attr('data-id');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "By this action appointment will be activated!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#47be7d",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, activate!",
                        cancelButtonText: "No,don't",
                        didOpen: () => {
                            // Additional custom styling if needed
                            document.querySelector('.swal2-icon').style.border = 'none';
                        }
                    }).then(function(t) {
                        if (t.value) {
                            changeStatus(pending_id)
                            Swal.fire({
                                title: "Success!",
                                text: "Appointment has been Activated!",
                                type: "success",
                                confirmButtonColor: "#056ee9",
                                confirmButtonText: "OK"
                            });
                        }
                    })
                });



                var table = $('#kt_table_users').DataTable({
                    deferRender: true, // Enable deferred rendering
                    serverSide: true,
                    processing: true,
                    "pageLength": 300,
                    "lengthMenu": [300, 500, 1000, 1500],
                    ajax: {
                        url: "@adminRoute('appointment.pending_appointment')",
                        data: function(d) {
                            d.from_date = $('.from_date').val(),
                                d.to_date = $('.to_date').val(),
                                d.search_supplier = $('#search-supplier').val();
                        }
                    },

                    columns: [{
                            data: 'id',
                            name: 'id'
                        },

                        {
                            data: 'mr_no',
                            name: 'mr_no'
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
                            data: 'payment',
                            name: 'payment'
                        },
                        {
                            data: 'pending',
                            name: 'pending'
                        },


                    ],
                    // dom: '<"custom-container"<"show-entries"l><"search-input"f>>tipr'
                });
                $('.from_date , .to_date').change(function() {
                    table.draw();
                })
            })
        </script>
    @endpush
@endsection
