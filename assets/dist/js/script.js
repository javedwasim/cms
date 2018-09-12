$(document.body).on('click', '.add-advice', function(){
    var name = $('#advice_name').val();
    $.ajax({
        url: '/cms/setting/add_advice',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
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
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});


$(document.body).on('click', '#advice_item_btn', function(){
    $.ajax({
        url: $('#advice_item_form').attr('data-action'),
        type: 'post',
        data: $('#advice_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });

    return false;
});


$(document.body).on('click', '.delete-advice-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '.add-research', function(){
    var name = $('#research_name').val();
    $.ajax({
        url: '/cms/setting/add_research',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.edit-research-btn', function(){
    $('#research_form')[0].reset();
    var r_id = $(this).attr('data-research-id');
    $('#research_id').val($(this).attr('data-research-id'));
    $.ajax({
        url: '/cms/setting/get_research_description',
        type: 'post',
        data: {id:r_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#description').val(response.description);
                $('#research_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });


    return false;

});

$(document.body).on('click', '#save_research_description', function(){
    $.ajax({
        url: $('#research_form').attr('data-action'),
        type: 'post',
        data:  $('#research_form').serialize(),
        cache: false,
        success: function(response) {
            $('#research_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-research', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '.add-lab-category', function(){
    var name = $('#lab_category').val();
    $.ajax({
        url: '/cms/setting/add_lab_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.edit-lab-cat-btn', function(){
    $('#lab_category_form')[0].reset();
    var cat_id = $(this).attr('data-lab-category-id');
    $('#lab_category_id').val($(this).attr('data-lab-category-id'));
    $.ajax({
        url: '/cms/setting/get_lab_category_description',
        type: 'post',
        data: {id:cat_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#description').val(response.description);
                $('#lab_category_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });

    return false;

});


$(document.body).on('click', '#save_lab_category_description', function(){
    $.ajax({
        url: $('#lab_category_form').attr('data-action'),
        type: 'post',
        data:  $('#lab_category_form').serialize(),
        cache: false,
        success: function(response) {
            $('#lab_category_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-lab-category', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '#lab_test_item', function(){
    $.ajax({
        url: $('#lab_test_form').attr('data-action'),
        type: 'post',
        data: $('#lab_test_form').serialize(),
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });

    return false;
});

$(document.body).on('click', '.delete-lab-test', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '.edit-lab-test-btn', function(){
    $('#lab_test_form_modal')[0].reset();
    var cat_id = $(this).attr('data-lab-test-id');
    $('#lab_test_id').val($(this).attr('data-lab-test-id'));
    $.ajax({
        url: '/cms/setting/get_lab_test_description',
        type: 'post',
        data: {id:cat_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#test_description').val(response.description);
                $('#lab_test_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });

    return false;

});

$(document.body).on('click', '#save_lab_test_description', function(){
    $.ajax({
        url: $('#lab_test_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#lab_test_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#lab_test_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});


function filter_tests(cat_id) {
    $.ajax({
        url: '/cms/setting/get_lab_test_by_category/'+cat_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
        }
    });
    return false;
}