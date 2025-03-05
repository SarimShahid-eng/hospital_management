function formatUser(user) {
if (!user.id) {
return user.text;
}

var avatarUrl = user.image ? '{{ asset('images/patient_profile/') }}' + '/' + user.image : '' ||
'';
var title = user.firstname;
var mrNo = user.mr_no || 'N/A';
var phoneNo = user.phone_no || 'N/A';
var receiptNo = user.receipt_no || 'N/A';
var branch = user.branch || 'N/A';

var $user = $(
'<div class="select2-result-repository clearfix">' +
    '<div class="select2-result-repository__avatar">' +
        '<img src="' + avatarUrl + '" class="img-fluid rounded" alt="Avatar" />' +
        '</div>' +
    '<div class="select2-result-repository__meta">' +
        '<div class="select2-result-repository__title">' + title + '</div>' +
        '<div class="select2-result-repository__statistics">' +
            '<div class="select2-result-repository__forks text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-flash"></span> MR# ' + mrNo +
                '</div>' +
            '<div class="select2-result-repository__stargazers text-start text-muted fw-bold fs-7 text-uppercase gs-0">'
                +
                '<span class="glyphicon glyphicon-star"></span> Phone# ' + phoneNo +
                '</div>' +
            '<div class="select2-result-repository__watchers text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-eye-open"></span> Receipt# ' + receiptNo +
                '</div>' +
            '<div class="select2-result-repository__watchers text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-eye-open"></span> Branch# ' + branch +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>'
);

return $user;
}

function formatUserSelection(user) {
return user.firstname || user.text;
}
