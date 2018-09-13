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
    var test_id = $(this).attr('data-lab-test-id');
    $('#lab_test_id').val($(this).attr('data-lab-test-id'));
    $.ajax({
        url: '/cms/setting/get_lab_test_description',
        type: 'post',
        data: {id:test_id},
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

function filter_tests_item(test_id) {
    $.ajax({
        url: '/cms/setting/get_lab_item_by_test_id/'+test_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '#lab_test_item_btn', function(){
    $.ajax({
        url: $('#lab_test_item_form').attr('data-action'),
        type: 'post',
        data: $('#lab_test_item_form').serialize(),
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

$(document.body).on('click', '#save_lab_test_item_description', function(){
    $.ajax({
        url: $('#lab_test_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#lab_test_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#lab_test_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.edit-lab-test-item-btn', function(){
    $('#lab_test_item_form_modal')[0].reset();
    var test_id = $(this).attr('data-lab-test-item-id');
    $('#lab_test_item_id').val($(this).attr('data-lab-test-item-id'));
    $.ajax({
        url: '/cms/setting/get_lab_test_item_description',
        type: 'post',
        data: {id:test_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#test_item_description').val(response.description);
                $('#lab_test_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});


$(document.body).on('click', '.add-instruction-category', function(){
    var name = $('#instruction_name').val();
    $.ajax({
        url: '/cms/instruction/add_instruction_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.ins_category_container').empty();
            $('.ins_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-inst', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.ins_category_container').empty();
                $('.ins_category_container').append(response.result_html);
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

function filter_inst_item_category(inst_id) {
    $.ajax({
        url: '/cms/instruction/get_inst_item/'+inst_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.ins_item_container').empty();
            $('.ins_item_container').append(response.result_html);
            $('.datatables').DataTable();
        }
    });
    return false;
}

$(document.body).on('click', '#inst_item_btn', function(){
    $.ajax({
        url: $('#lab_test_item_form').attr('data-action'),
        type: 'post',
        data: $('#lab_test_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.ins_item_container').empty();
            $('.ins_item_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.edit-inst-item-btn', function(){
    $('#inst_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-inst-item-id');
    $('#inst_item_id').val($(this).attr('data-inst-item-id'));
    $.ajax({
        url: '/cms/instruction/get_inst_item_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#inst_item_description').val(response.description);
                $('#inst_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});


$(document.body).on('click', '#save_inst_item_description', function(){
    $.ajax({
        url: $('#inst_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#inst_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#inst_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-inst-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.ins_item_container').empty();
                $('.ins_item_container').append(response.result_html);
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

$(document.body).on('click', '.add-examination-category', function(){
    var name = $('#instruction_name').val();
    $.ajax({
        url: '/cms/examination/add_examination_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.ins_category_container').empty();
            $('.ins_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-examination', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.ins_category_container').empty();
                $('.ins_category_container').append(response.result_html);
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

$(document.body).on('click', '#examination_item_btn', function(){
    $.ajax({
        url: $('#examination_item_form').attr('data-action'),
        type: 'post',
        data: $('#examination_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.examination_item_container').empty();
            $('.examination_item_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-examination-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.examination_item_container').empty();
                $('.examination_item_container').append(response.result_html);
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

function filter_examination_item_category(inst_id) {
    $.ajax({
        url: '/cms/examination/get_examination_item/'+inst_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.examination_item_container').empty();
            $('.examination_item_container').append(response.result_html);
            $('.datatables').DataTable();
        }
    });
    return false;
}

$(document.body).on('click', '.edit-examination-item-btn', function(){
    $('#examination_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-examination-item-id');
    $('#examination_item_id').val($(this).attr('data-examination-item-id'));
    $.ajax({
        url: '/cms/examination/get_examination_item_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#examination_item_description').val(response.description);
                $('#examination_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_examination_item_description', function(){
    $.ajax({
        url: $('#examination_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#examination_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#examination_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});


$(document.body).on('click', '.add-investigation-category', function(){
    var name = $('#instruction_name').val();
    $.ajax({
        url: '/cms/investigation/add_investigation_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.investigation_category_container').empty();
            $('.investigation_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-investigation', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.investigation_category_container').empty();
                $('.investigation_category_container').append(response.result_html);
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

$(document.body).on('click', '#investigation_item_btn', function(){
    $.ajax({
        url: $('#investigation_item_form').attr('data-action'),
        type: 'post',
        data: $('#investigation_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.investigation_item_container').empty();
            $('.investigation_item_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});


$(document.body).on('click', '.edit-investigation-item-btn', function(){
    $('#investigation_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-investigation-item-id');
    $('#investigation_item_id').val($(this).attr('data-investigation-item-id'));
    $.ajax({
        url: '/cms/investigation/get_investigation_item_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#investigation_item_description').val(response.description);
                $('#investigation_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_investigation_item_description', function(){
    $.ajax({
        url: $('#investigation_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#investigation_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#investigation_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

function filter_investigation_item_category(inst_id) {
    $.ajax({
        url: '/cms/investigation/get_investigation_item/'+inst_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.investigation_item_container').empty();
            $('.investigation_item_container').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '#add_recommendation', function(){
    var description = $('#add_description').val();
    $.ajax({
        url: '/cms/angio_recommendation/add_recommendation',
        type: 'post',
        data: {description:description},
        cache: false,
        success: function(response) {
            $('.recommendation_container').empty();
            $('.recommendation_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-recommendation', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.recommendation_container').empty();
                $('.recommendation_container').append(response.result_html);
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