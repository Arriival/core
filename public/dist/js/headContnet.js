$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});

function deleteEntity(url) {
    $.ajax({
        url: url,
        type: 'DELETE',
        contentType: 'application/json; charset=utf-8',
        success: function (res) {
            console.log(res);
        }
    });
}