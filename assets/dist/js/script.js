$(document.body).on('click', '.add-advice', function(){
    var name = $('#advice_name').val();
    $.ajax({
        url: '/cms/setting/add_advice',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {

            $('#advice_table_div').empty();
            $('#advice_table_div').append(response.result_html);

            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["success"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-advice', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('#advice_table_div').empty();
                $('#advice_table_div').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});