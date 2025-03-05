// alert('dssd');
function page_loader(status){
    if(status == 'hide'){
        // $('#status').fadeOut();
        $('#ht-preloader').fadeOut();
        return;
    }

    // $('#status').fadeIn();
    $('#ht-preloader').fadeIn();
    return;
}
if ($('[data-toggle="select2"]').length > 0) {
    $('[data-toggle="select2"]').select2()
}
function toast(msg, title, type, timer){
    var opts = {
        title: title,
        html: msg,
        type: type,
        confirmButtonClass: "btn btn-confirm mt-2"
    };
    if(timer !== undefined){
        opts.timer = timer;
    }
    Swal.fire(opts);
}

function initImageUploadForm() {
    var submit_btn = $("form.imageUploadForm").data('submitBtn'),
        disabled_btn = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading...';

    if (submit_btn === null || submit_btn === undefined || submit_btn === '') {
        submit_btn = 'Submit';
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    $("form.imageUploadForm button[type='submit']").removeAttr('disabled');
    $("form.imageUploadForm").parsley();

    $("form.imageUploadForm").on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var formData = new FormData(this);

        page_loader('show');
        $("button[type=submit]").attr("disabled", 'disabled').html(disabled_btn);

        if (form.hasClass('popup')) {
            var r = confirm("Are you sure?");
            if (!r) {
                $("button[type=submit]").removeAttr("disabled").html(submit_btn);
                page_loader('hide');
                return false;
            }
        }

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            complete: function() {
                page_loader('hide');
            },
            error: function(data, err, msg) {
                page_loader('hide');
                $("button[type=submit]").removeAttr("disabled").html(submit_btn);
                ajaxErrorHandling(data, msg);
            },
            success: function(data) {
                $("button[type=submit]").removeAttr("disabled").html(submit_btn);

                if (data['error'] !== undefined) {
                    toast(data['error'], "Error!", 'error');
                } else if (data['success'] !== undefined) {
                    toast(data['success'], "Success!", 'success', 1200);
                    // $('form.imageUploadForm').clearForm();
                } else if (data['info'] !== undefined) {
                    toast(data['info'], "Info", 'info');
                }

                if (data['errors'] !== undefined) {
                    multiple_errors_ajax_handling(data['errors']);
                }

                if (data['redirect'] !== undefined) {
                    window.setTimeout(function () {
                        window.location = data['redirect'];
                    }, 2000);
                }
                if (data['reload'] !== undefined) {
                    window.setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                }
            }
        });
    });
}



function initAjaxForm() {
    var submit_btn = $("form.ajaxForm").data('submitBtn'),
        disabled_btn = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading...';

    if (submit_btn === null || submit_btn === undefined || submit_btn === '') {
        submit_btn = 'Submit';
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    })
    $("form.ajaxForm button[type='submit']").removeAttr('disabled');
    $("form.ajaxForm").parsley();

    $("form.ajaxForm").ajaxForm({
        dataType: "json",
        beforeSubmit: function () {
            page_loader('show');

            $("button[type=submit]").attr("disabled", 'disabled').html(disabled_btn);

            if ($("form.ajaxForm").hasClass('popup')) {
                r = confirm("Are you sure?");
                if (!r) {
                    $("button[type=submit]").removeAttr("disabled").html(submit_btn);
                    page_loader('hide');
                    return false;
                }
            }

        },
        complete: function () {
            page_loader('hide');
        },
        error: function (data, err, msg) {
            page_loader('hide');
            $("button[type=submit]").removeAttr("disabled").html(submit_btn);
            ajaxErrorHandling(data, msg);
        },
        success: function (data) {
            $("button[type=submit]").removeAttr("disabled").html(submit_btn);

            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
            } else if (data['success'] !== undefined) {
                toast(data['success'], "Success!", 'success', 1200);
                // $('form.ajaxForm').clearForm();
            } else if (data['info'] !== undefined) {
                toast(data['info'], "Info", 'info');
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }

            if (data['redirect'] !== undefined) {
                window.setTimeout(function () {
                    window.location = data['redirect'];
                }, 2000);

            }
            if (data['reload'] !== undefined) {
                window.setTimeout(function () {
                    window.location.reload(true);
                }, 1000);
            }
        }
    });
}

function ajaxRequest(_self) {
    // alert())
    var href = $(_self).attr('data-url');
    // alert(href)
    run_ajax(href);
}


function run_ajax(href){
    page_loader('show');
    $.ajax({
        url: href,
        dataType: "json",
        complete: function () {
            page_loader('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxErrorHandling(jqXHR, errorThrown);
        },
        success: function (data) {
            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
            } else if (data['success'] !== undefined) {
                toast(data['success'], "Success!", 'success', 1200);
            } else if (data['info'] !== undefined) {
                toast(data['info'], "Info", 'info');
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }

            if (data['reload'] !== undefined) {
                setTimeout(function () {
                    window.location.reload(true);
                }, 400);
            }

            if (data['redirect'] !== undefined) {
                setTimeout(function () {
                    window.location = data['redirect'];
                }, 400);
            }
        }
    });
}

function getAjaxRequests(url, params, method, callback) {
    page_loader('show');

    var params = (!params && params != '') ? {} : params;
    var method = (!method && method != '') ? "POST" : method;

    $.ajax({
        url: url,
        method: method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: params,
        dataType: "json",
        complete: function () {
            page_loader('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, errorThrown)
            // ajaxErrorHandling(jqXHR, errorThrown);
        },
        success: function (data) {
            if (data['reload'] !== undefined) {
                setTimeout(function () {
                    window.location.reload(true);
                }, 400);
                return false;
            }
            if (data['redirect'] !== undefined) {
                setTimeout(function () {
                    window.location = data['redirect'];
                }, 400);
                return false;
            }
            if (data['error'] !== undefined) {
                toast(data['error'], "Error!", 'error');
                return false;
            }

            if (data['errors'] !== undefined) {
                multiple_errors_ajax_handling(data['errors']);
            }
            callback(data);
        }
    });
}


function ajaxErrorHandling(data, msg){
    if (data.hasOwnProperty("responseJSON")) {
        var resp = data.responseJSON;

        if (resp.message != 'The given data was invalid.') {
            toast(resp.message, "Error!", "error");
            return;
        }
        if (resp.message == 'CSRF token mismatch.') {
            toast("Page has been expired and will reload in 2 seconds", "Page Expired!", "error");
            setTimeout(function () {
                window.location.reload();
            }, 2000);
            return;
        }
        $_html = "";
        for (error in resp.errors) {
            $_html += "<p class='m-1 text-danger'><strong>" + resp.errors[error][0] + "</strong></p>";
        }
        // toast($_html, "Error!", 'error');
        multiple_errors_ajax_handling(resp.errors);
    } else {
        // toast(msg + "!", "Error!", 'error');
    }
    return;
}

function multiple_errors_ajax_handling(errors){
    $_html = "";
    for (error in errors) {
        $_html += "<p class='m-1 text-danger'><strong>" + errors[error][0] + "</strong></p>";
    }
    toast($_html, "Error!", 'error');
    return false;
}

function logout(e){
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "By this action you will be logged out are you sure you want to continue!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log me out!"
    }).then(function (t) {
        if (t.value){
            document.getElementById('logout-form').submit();
        }
    })
}

function adminClearNotifications(e){
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "By this action you will be logged out are you sure you want to continue!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log me out!"
    }).then(function (t) {
        if (t.value){
            document.getElementById('logout-form').submit();
        }
    })
}


$(document).ready(function () {
    // alert('sdds')
    initAjaxForm();
    initImageUploadForm();
    // getAjaxRequests(url=null, params=null, method=false)

    // getAjaxRequests(url='', params='', method='', callback='');
});
