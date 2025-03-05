@extends('layout.index')
@section('content')
    @include('user.modal')
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
                            <col style="width: 131.375px;">
                            {{-- <col style="width: 176.828px;">
                            <col style="width: 107.047px;"> --}}
                        </colgroup>
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">

                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">Menu name</span><span
                                        class="dt-column-order"></span></th>
                                <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1"
                                    colspan="1" aria-label="User: Activate to sort" tabindex="0"><span
                                        class="dt-column-title" role="button">View</span><span
                                        class="dt-column-order"></span></th>

                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Insert</span><span
                                        class="dt-column-order"></span>
                                </th>
                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Update</span><span
                                        class="dt-column-order"></span>
                                </th>
                                <th class=" min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1" colspan="1"
                                    aria-label="Actions"><span class="dt-column-title">Delete</span><span
                                        class="dt-column-order"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->menu_name }}</td>
                                    <td><label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="item-checkbox form-check-input" aria-label="view" type="checkbox"
                                                value="{{ $permission->id }}" @checked($permission->view == 1)>

                                        </label></td>
                                    <td><label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="item-checkbox form-check-input" aria-label="insert"
                                                type="checkbox" value="{{ $permission->id }}" @checked($permission->insert == 1)>

                                        </label></td>
                                    <td><label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="item-checkbox form-check-input" aria-label="update"
                                                type="checkbox" value="{{ $permission->id }}" @checked($permission->update == 1)>

                                        </label></td>
                                    <td><label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="item-checkbox form-check-input" aria-label="delete"
                                                type="checkbox" value="{{ $permission->id }}" @checked($permission->delete == 1)>

                                        </label></td>

                                </tr>
                            @endforeach
                        </tbody>

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

                $('.item-checkbox').change(function() {
                    var column_name = $(this).attr('aria-label')
                    var id = $(this).val()
                    let status;
                    if ($(this).is(':checked')) {
                        status = 1
                    } else {
                        status = 0
                    }
                    getAjaxRequests(`{{ route('permission.control') }}`, {status:status,p_id:id,column:column_name}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.delete', function() {

                    var delete_url = $(this).data('url')
                    $('.delete_notify').attr('data-url', delete_url)
                })


            })
        </script>
    @endpush
@endsection
