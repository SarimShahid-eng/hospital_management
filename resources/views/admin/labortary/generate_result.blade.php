<div id="generate_result" class="modal fade zoomIn delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <form  class="form ajaxForm " method="POST"
                action="{{ route('admin.labortary.request_test_store') }}">
                @csrf
            <div class="modal-body">

                <div id="modal_body" class="mt-2 ">

                </div>
                <div class="card-footer d-flex gap-2 justify-content-center mt-4 mb-2">
                    {{-- <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" class=" btn w-sm btn-danger">Generate Result</button>
                </div>
            </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
