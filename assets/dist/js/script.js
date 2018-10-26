$(document.body).on('click', '.add-advice', function(){
    var validate = $( "#advice_category_form" ).validate();
    if (validate.form()) {
        var name = $('#advice_name').val();
        $.ajax({
            url: '/cms/setting/add_advice',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#advice_name').val('');
            }
        });
        return false;
    }
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
                    toastr["error"](response.message);
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
    var validate = $( "#advice_item_form" ).validate();
    if (validate.form()) {
        $.ajax({
            url: $('#advice_item_form').attr('data-action'),
            type: 'post',
            data: $('#advice_item_form').serialize(),
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#advice_item_form')[0].reset();
            }
        });

        return false;
    }
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
                    toastr["error"](response.message);
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
    var validate = $( "#research_category_form" ).validate();
    if (validate.form()) {
        var name = $('#research_name').val();
        $.ajax({
            url: '/cms/setting/add_research',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#research_name').val('');
            }
        });
        return false;
    }
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
                    toastr["error"](response.message);
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
                    toastr["error"](response.message);
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
                    toastr["error"](response.message);
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
    var validate = $( "#inst_category_form" ).validate();
    if (validate.form()) {
        var name = $('#instruction_name').val();
        var category = $('#instruction_category').val();
        $.ajax({
            url: '/cms/instruction/add_instruction_category',
            type: 'post',
            data: {name: name, category: category},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#instruction_name').val('');
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-inst', function(){
    if (confirm('Are you sure to delete this record?')) {
        var category = $(this).attr('data-category');
        var id = $(this).attr('data-category-id');
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            data: {category:category,id:id},
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

function filter_inst_item_category(inst_id,category) {
    var nurl = window.location.origin+window.location.pathname+'/setting/export_instruction_items/'+inst_id;
    $("#export_instruction_items").attr("href", nurl);
    $.ajax({
        url: '/cms/instruction/get_inst_item',
        type: 'post',
        data: {inst_id:inst_id,category:category},
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
    var validate = $( "#isnt_item_form" ).validate();
    if (validate.form()) {
        $.ajax({
            url: $('#isnt_item_form').attr('data-action'),
            type: 'post',
            data: $('#isnt_item_form').serialize(),
            cache: false,
            success: function (response) {
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
    }
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
        var category = $(this).attr('data-category');
        var id = $(this).attr('data-category-id');
        $.ajax({
            url: $(this).attr('data-href'),
            type: 'post',
            data: {category:category,id:id},
            cache: false,
            success: function(response) {
                $('.ins_item_container').empty();
                $('.ins_item_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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
    var validate = $( "#exam_category_form" ).validate();
    if (validate.form()) {
        var name = $('#instruction_name').val();
        $.ajax({
            url: '/cms/examination/add_examination_category',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#instruction_name').val('');
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-examination', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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
    var validate = $( "#examination_item_form" ).validate();
    if (validate.form()) {
        $.ajax({
            url: $('#examination_item_form').attr('data-action'),
            type: 'post',
            data: $('#examination_item_form').serialize(),
            cache: false,
            success: function (response) {
                $('#examination_item_form')[0].reset();
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
    }
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
                    toastr["error"](response.message);
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
    var nurl = window.location.origin+window.location.pathname+'/setting/export_examination_items/'+inst_id;
    $("#export_examination_items").attr("href", nurl);
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
    var validate = $( "#investigation_category_form" ).validate();
    if (validate.form()) {
        var name = $('#instruction_name').val();
        $.ajax({
            url: '/cms/investigation/add_investigation_category',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#instruction_name').val('');
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-investigation', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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
    var validate = $( "#investigation_item_form" ).validate();
    if (validate.form()) {
        $.ajax({
            url: $('#investigation_item_form').attr('data-action'),
            type: 'post',
            data: $('#investigation_item_form').serialize(),
            cache: false,
            success: function (response) {
                $('.investigation_item_container').empty();
                $('.investigation_item_container').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        $('#investigation_item_form')[0].reset();
        return false;
    }
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

$(document.body).on('click', '.delete-investigation-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.investigation_item_container').empty();
                $('.investigation_item_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

function filter_investigation_item_category(inst_id) {
    var nurl = window.location.origin+window.location.pathname+'/setting/export_investigation_items/'+inst_id;
    $("#export_investigation_items").attr("href", nurl);
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
    var validate = $( "#angio_form" ).validate();
    if(validate.form()){
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
                $('#add_description').val('');
            }
        });
        return false;
    }
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
                    toastr["error"](response.message);
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

$(document.body).on('click', '.add-medicine-category', function(){
    var validate = $( "#medicine_category_form" ).validate();
    if (validate.form()) {
        var name = $('#medicine_name').val();
        $.ajax({
            url: '/cms/medicine/add_medicine_category',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#medicine_name').val('');
            }
        });
        return false;
    }
});


$(document.body).on('click', '.delete-medicine', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

$(document.body).on('click', '#medicine_item_btn', function(){
    var validate = $( "#medicine_item_form" ).validate();
    if (validate.form()) {
        $.ajax({
            url: $('#medicine_item_form').attr('data-action'),
            type: 'post',
            data: $('#medicine_item_form').serialize(),
            cache: false,
            success: function (response) {
                $('.medicine_item_container').empty();
                $('.medicine_item_container').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#medicine_item_form')[0].reset();
            }
        });

        return false;
    }

});

$(document.body).on('click', '.delete-medicine-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.medicine_item_container').empty();
                $('.medicine_item_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

$(document.body).on('click', '.edit-medicine-item-btn', function(){
    $('#medicine_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-medicine-item-id');
    $('#medicine_item_id').val($(this).attr('data-medicine-item-id'));
    $.ajax({
        url: '/cms/medicine/get_medicine_item_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#medicine_item_description').val(response.description);
                $('#medicine_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_medicine_item_description', function(){
    $.ajax({
        url: $('#medicine_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#medicine_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#medicine_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.add-dosage-category', function(){
    var validate = $( "#dosage_category_form" ).validate();
    if (validate.form()) {
        var name = $('#dosage_name').val();
        $.ajax({
            url: '/cms/medicine/add_dosage_category',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dosage_category_container').empty();
                $('.dosage_category_container').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#dosage_name').val('');
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-dosage', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.dosage_category_container').empty();
                $('.dosage_category_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

function filter_medicine_item_category(inst_id) {
    var nurl = window.location.origin+window.location.pathname+'/setting/export_medicine_items/'+inst_id;
    $("#export_medicine_items").attr("href", nurl);
    $.ajax({
        url: '/cms/medicine/get_medicine_item/'+inst_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.medicine_item_container').empty();
            $('.medicine_item_container').append(response.result_html);
        }
    });
    return false;
}

function assign_medicine_category(medicine_category_id) {
    $('#medicine_category').val(medicine_category_id);
    $.ajax({
        url: '/cms/medicine/get_dosage_medicine_category/'+medicine_category_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.dosage_medicine_table').empty();
            $('.dosage_medicine_table').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '#update_dosage_medicine_btn', function(){
    $.ajax({
        url: $('#update_dosage_medicine_form').attr('data-action'),
        type: 'post',
        data: $('#update_dosage_medicine_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.add-disease-category', function(){
    var validate = $( "#disease_category_form" ).validate();
    if (validate.form()) {
        var name = $('#disease').val();
        $.ajax({
            url: window.location.origin + window.location.pathname + 'echo_controller/add_disease_category',
            type: 'post',
            data: {name: name},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
                $('#disease').val('');
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-disease', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                if (response.success) {
                    toastr["error"](response.message);
                    $('.dashboard-content').empty();
                    $('.dashboard-content').append(response.result_html);
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

$(document.body).on('click', '.add-structure-category', function(){
    var name = $('#structure').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_structure_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
                $('.structure_category_container').empty();
                $('.structure_category_container').append(response.result_html);

            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.delete-structure', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.structure_category_container').empty();
                $('.structure_category_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

$(document.body).on('click', '.add-structure-finding', function(){
    var finding_name = $('#structure_finding').val();
    var structure_id = $('#structure_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_structure_finding',
        type: 'post',
        data: {name:finding_name,structure_id:structure_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
                $('.structure_finding_container').empty();
                $('.structure_finding_container').append(response.result_html);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-finding', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.structure_finding_container').empty();
                $('.structure_finding_container').append(response.result_html);

                //remove background and color on all elements and remove color
                $(".structure_table td").css("background-color", "#FFF");
                $(".structure_table td").css("color", "#1b1a1a");
                var structure_id = $('#structure_id').val();
                $('#'+structure_id).css("background", "#1e88e5");
                $('#'+structure_id).css("color", "#FFF");

                toastr["error"]('Finding deleted successfully!');
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '.add-structure-diagnosis', function(){
    var diagnosis_name = $('#structure_diagnosis').val();
    var structure_id = $('#structure_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_structure_diagnosis',
        type: 'post',
        data: {name:diagnosis_name,structure_id:structure_id},
        cache: false,
        success: function(response) {
            $('.structure_diagnosis_container').empty();
            $('.structure_diagnosis_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-diagnosis', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.structure_diagnosis_container').empty();
                $('.structure_diagnosis_container').append(response.result_html);

                //select parent structure
                $(".structure_table td").css("background-color", "#FFF");
                $(".structure_table td").css("color", "#1b1a1a");
                var structure_id = $('#structure_id').val();
                $('#'+structure_id).css("background", "#1e88e5");
                $('#'+structure_id).css("color", "#FFF");
                toastr["error"]('Finding deleted successfully!');
            }
        });
    } else {
        return false;
    }
    return false;
});

$(document.body).on('click', '.finding_radio', function(){
   var finding_id = $(this).attr('data-finding-id');
   var structure_id = $(this).attr('data-structure-id');
   var disease_id = $('#assign_disease_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/assign_finding_to_disease',
        type: 'post',
        data: {finding_id:finding_id,disease_id:disease_id,structure_id:structure_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('click', '.diagnose_radio', function(){
    var diagnose_id = $(this).attr('data-diagnose-id');
    var disease_id = $('#assign_disease_id').val();
    var structure_id = $(this).attr('data-structure-id');
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/assign_diagnose_to_disease',
        type: 'post',
        data: {disease_id:disease_id,diagnose_id:diagnose_id,structure_id:structure_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('click', '#main_category_item_btn', function(){
    var main_category_name = $('#main_category_name').val();
    var main_category = $('#main_category').val();

    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_main_category_item',
        type: 'post',
        data: {name:main_category_name,main_category:main_category},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["success"](response.message);
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
            } else {
                toastr["error"](response.message);
            }
            $('#main_category').val('');
            $('#main_category_name').val('');
            $( ".disease_container" ).removeClass( "active" );
        }
    });

    return false;
});


$(document.body).on('click', '.delete-main-category-item', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.main_category_container').empty();
                $('.main_category_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

function main_category_item_filter(category) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/get_main_category_by_filter/'+category,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.main_category_container').empty();
            $('.main_category_container').append(response.result_html);
        }
    });
    return false;
}

function category_measurement_filter(category) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/get_measurement_by_filter/'+category,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.category_measurement_container').empty();
            $('.category_measurement_container').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '#main_category_measurement_btn', function(){
    var item = $('#measurement_item').val();
    var value = $('#normal_value').val();
    var category_id = $('#category_id').val();

    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_category_measurement',
        type: 'post',
        data: {item:item,value:value,category_id:category_id},
        cache: false,
        success: function(response) {
            $('.category_measurement_container').empty();
            $('.category_measurement_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
            $('#measurement_item').val('');
            $('#normal_value').val('');
            $('#category_id').val('');
        }
    });
    return false;
});

$(document.body).on('click', '.delete-main-measurement', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.category_measurement_container').empty();
                $('.category_measurement_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

$(document.body).on('click', '.add-profile-history', function(){
    var name = $('#profile_history').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile_history/add_profile_history',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.history_category_container').empty();
            $('.history_category_container').append(response.result_html);
            $('#profile_history').val('');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-history', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.history_category_container').empty();
                $('.history_category_container').append(response.result_html);
                if (response.success) {
                    toastr["error"](response.message);
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

$(document.body).on('click', '#history_item_btn', function(){
    $.ajax({
        url: $('#history_item_form').attr('data-action'),
        type: 'post',
        data: $('#history_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.history_item_container').empty();
            $('.history_item_container').append(response.result_html);
            $('#history_items_name').val('');
            $('#profile_history_id').val("");
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.edit-history-item-btn', function(){
    $('#history_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-history-item-id');
    $('#history_item_id').val($(this).attr('data-history-item-id'));
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile_history/get_history_item_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#history_item_description').val(response.description);
                $('#history_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_history_item_description', function(){
    $.ajax({
        url: $('#history_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#history_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#history_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.edit-profile-history-btn', function(){
    $('#profile_history_item_form_modal')[0].reset();
    var item_id = $(this).attr('data-profile-history-id');
    $('#profile_history_id').val($(this).attr('data-profile-history-id'));
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile_history/get_profile_history_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#profile_history_description').val(response.description);
                $('#profile_history_item_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_profile_history_description', function(){
    $.ajax({
        url: $('#profile_history_item_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#profile_history_item_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#profile_history_item_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document).ready(function () {
    var base_url = $('#base').val();
    $('.sidebar-menu').load(window.location.origin+window.location.pathname + "dashboard/get_menus", function () {
        $('.sidebar-menu').fadeIn('fast');
    });
});

$(document.body).on('click', '#register_new_user', function(){
    $.ajax({
        url: $('#register_user_form').attr('data-action'),
        type: 'post',
        data:  $('#register_user_form').serialize(),
        cache: false,
        success: function(response) {
            $('.user_table_content').remove();
            $('#user_table_content').append(response.user_html);
            if (response.success) {
                $("#register_user_form")[0].reset();
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.user_permission', function(){
    var permission = $(this).val();
    if($(this).is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({
        url: window.location.origin+window.location.pathname+'setting/assign_permission',
        type: 'post',
        data:  {permission:permission,status:status},
        cache: false,
        success: function(response) {
            toastr["success"](response.message);
        }

    });
    toastr["success"]('Information  save successfully!');
});

$(document.body).on('click', '.edit-inst-btn', function(){
    $('#inst_form_modal')[0].reset();
    var item_id = $(this).attr('data-inst-id');
    $('#inst_id').val($(this).attr('data-inst-id'));
    $.ajax({
        url: '/cms/instruction/get_inst_description',
        type: 'post',
        data: {id:item_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#inst_description').val(response.description);
                $('#inst_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_inst_description', function(){
    $.ajax({
        url: $('#inst_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#inst_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#inst_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '#save_profile_instruction', function(){
    var patient_id = $('#label_patient_id').text();
    var sd = $('#patient_id').val(patient_id);
    var  sp_inst_id = $('#sp-ins-table tbody tr.row_selected').find('.pat_sp_id').text();
    var as = $('#sp_inst_id').val(sp_inst_id);
    $.ajax({
        url: $('#profile_inst_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#profile_inst_form_modal').serialize(),
        cache: false,
        success: function(response) {
            $('#special_instruction').val('');
            if (response.success) {
                $('.sp_data_table').remove();
                $('#sp_data_table').append(response.sp_table);
                $("#sp-ins-table tbody tr").click(function (e) {
                    $('#sp-ins-table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#sp-ins-table tbody tr.row_selected', function(){
    var spid = $(this).find('.pat_sp_id').text();
    $.ajax({
        url: '/cms/profile/get_special_instructions',
        type: 'post',
        data: {spid:spid},
        cache: false,
        success: function(response){
            $('#special_instruction').val(response.special_instructions);
            $('#sp-instruction-noneditable').val(response.special_instructions);
        }
    });
});

/////////////////////////////////// load patient ett test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-ett-test', function () {
    var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: '/cms/profile/patient_ett_test',
        type: 'post',
        data: {patid:patid},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pat_ett_information').append(response.patient_information);
                $("#profile_ett_desc_table tbody tr:first").addClass('row_selected')
                $("#profile_ett_desc_table tbody tr").click(function (e) {
                    $('#profile_ett_desc_table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
                $("#profile_ett_conc_table tbody tr:first").addClass('row_selected')
                $("#profile_ett_conc_table tbody tr").click(function (e) {
                    $('#profile_ett_conc_table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
});

$(document.body).on('click','#profile_ett_desc_table tbody tr.row_selected',function(){
    var desc = $(this).find('.ett_pro_desc').text();
    $('#ett_desc_pro').val($('#ett_desc_pro').val()+desc+'\n');
});

$(document.body).on('click','#profile_ett_conc_table tbody tr.row_selected',function(){
    var conc = $(this).find('.ett_pro_conc').text();
    $('#ett_conc_pro').val($('#ett_conc_pro').val()+conc+'\n');
    
});



$(document.body).on('click', '#save_ett_test', function(e){
    e.preventDefault();
    var patientid = $('#label_patient_id').text();
    $('#ett_pat_id').val(patientid);
    $.ajax({
        url: '/cms/profile/save_ett_test',
        type: 'post',
        data:$('#ett_protocol_form').serialize(),
        cache: false,
        success: function(response){
            $('.content-wrapper').remove();
            $('#content-wrapper').append(response.result_html);
            $('.profile-table').remove();
            $('#profile_table').append(response.profile_table);
            ///////////////// initilize datatable //////////////
            $('.profiletable').DataTable({
                // "scrollX": true,
                "initComplete": function (settings, json) {
                    $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                }
            });
            $("#toggleresize1").click(function () {
                var icon = $('#toggleresize1 > .arro');
                icon.toggleClass('fa-arrow-left fa-arrow-right');
                $('.resize1').toggleClass("active_resize1");
                $('.resize2').toggleClass("inactive_resize2");

            });
            $("#toggleresize2").click(function () {
                var icon = $('#toggleresize2 > .arro');
                icon.toggleClass('fa-arrow-left fa-arrow-right');
                $('.resize2').toggleClass("active_resize2");
                $('.resize1').toggleClass("inactive_resize1");
            });
            $('#profiletable tbody tr:first').addClass('row_selected');
            $("#profiletable tbody tr").click(function (e) {
                $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            if (response.success == true) {
                toastr['success']('Saved Successfully.');
            }else{
                toastr['error']('Seems and error.');
            }
        }
    });

});

$(document.body).on('click', '#save_lab_test', function(){
    $.ajax({
        url: $('#lab_test_form_modal').attr('data-action'),
        type: 'post',
        data:  $('#lab_test_form_modal').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#lab_test_data_table').empty();
                $('#lab_test_data_table').append(response.sp_table);
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;

});

function filter_advice_item_category(advice_id) {
    $.ajax({
        url: '/cms/setting/get_advice_item/'+advice_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.dashboard-content').empty();
            $('.dashboard-content').append(response.result_html);
            var nurl = window.location.origin+window.location.pathname+'/setting/export_advice_items/'+response.cat_id;
            $("#export_advice_items").attr("href", nurl);
        }
    });
    return false;
}


$(document.body).on('click', '#pat-echo-test', function () {
    var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: '/cms/profile/patient_echo_test',
        type: 'post',
        data: {patid:patid},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pats_ett_information').append(response.patient_information);

                $('#main_category_list').empty();
                $('#main_category_list').append(response.main_category_table);


                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

$(document.body).on('click', '#echo_profile_form_btn', function () {
    $.ajax({
        url: $('#echo_profile_form').attr('data-action'),
        type: 'post',
        data:  $('#echo_profile_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                if(response.category_id=='mmode'){
                    $('#mmode_content').empty();
                    $('#mmode_content').append(response.result_html);
                }else if(response.category_id=='color_dooplers'){
                    $('#color-doppler-table').empty();
                    $('#color-doppler-table').append(response.result_html);
                }else{
                    $('#dooplers_content').empty();
                    $('#dooplers_content').append(response.result_html);
                }
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '#save_patient_echo_info', function(){
    var patient_id = $('#label_patient_id').text();
    var sd = $('.patient_id').val(patient_id);
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/save_profile_echo_info',
        type: 'post',
        data:  $("#echo_mmode_content_form").serialize() + "&" + $("#echo_dooplers_content_form").serialize()
               + "&" +$("#echo_finding_form").serialize() + "&" + $("#echo_diagnosis_form").serialize(),
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

$(document.body).on('click', '#echo_detail', function () {
    var patient_id = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/get_echo_detail',
        type: 'post',
        data:  {patient_id:patient_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#echo_detail_container').empty();
                $('#echo_detail_container').append(response.echo_detail);
            } else {
                toastr["error"](response.message);
            }
        }
    });

});

function showEditEchoDetail(editableObj,echo_id,patient_id) {
    $('.echo_detail_id').val(echo_id);
    $.ajax({
        url: '/cms/profile/patient_echo_edit_detail',
        type: 'post',
        data: {detail_id:echo_id,patid:patient_id},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pats_ett_information').append(response.patient_information);

                $('#main_category_list').empty();
                $('#main_category_list').append(response.main_category_table);


                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
}


$(document.body).on('click', '#lab_test_detail', function () {
    var patient_id = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/get_lab_test_detail',
        type: 'post',
        data:  {patient_id:patient_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#echo_detail_container').empty();
                $('#echo_detail_container').append(response.lab_detail);
            } else {
                toastr["error"](response.message);
            }
        }
    });

});


// function showEditLabDetail(editableObj,echo_id,patient_id) {
//     $('.echo_detail_id').val(echo_id);
//     $.ajax({
//         url: '/cms/profile/patient_echo_lab_edit_detail',
//         type: 'post',
//         data: {detail_id:echo_id,patid:patient_id},
//         cache: false,
//         success: function (response) {
//             if (response.result_html != '') {
//                 $('.content-wrapper').remove();
//                 $('#content-wrapper').append(response.result_html);
//                 $('.patient_info').remove();
//                 $('#pat_sp_information').append(response.patient_information);
//                 $('.lab-date').datepicker({
//                     format: 'd-M-yyyy'
//                 });
//                 $('#lab_test_data_table').empty();
//                 $('#lab_test_data_table').append(response.test_table);
//             }
//         }
//     });
// }
$(document.body).on('click', '#ett_details', function () {
    var patient_id = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/get_ett_detail',
        type: 'post',
        data:  {patient_id:patient_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#echo_detail_container').empty();
                $('#echo_detail_container').append(response.ett_detail);
            } else {
                toastr["error"](response.message);
            }
        }
    });

});

function showEditEttDetail(editableObj,ett_id,patient_id) {
    $.ajax({
        url: '/cms/profile/patient_ett_edit_detail',
        type: 'post',
        data: {detail_id:ett_id,patid:patient_id},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pat_ett_information').append(response.patient_information);
                $("#profile_ett_desc_table tbody tr:first").addClass('row_selected')
                $("#profile_ett_desc_table tbody tr").click(function (e) {
                    $('#profile_ett_desc_table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
                $("#profile_ett_conc_table tbody tr:first").addClass('row_selected')
                $("#profile_ett_conc_table tbody tr").click(function (e) {
                    $('#profile_ett_conc_table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
}
$(document.body).on('click', '#save_patient_examination_info', function(){
    var patient_id = $('#label_patient_id').text();
    var sd = $('.patient_id').val(patient_id);
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/save_profile_examination_info',
        type: 'post',
        data:  $("#history_profile_form").serialize() + "&" + $("#exem_measurement_form").serialize()
                + "&" + $("#examination_profile_form").serialize()
                + "&" +$("#investigation_profile_form").serialize() + "&" + $("#medicine_profile_form").serialize()
                + "&" +$("#dosage_profile_form").serialize() + "&" + $("#advice_profile_form").serialize()
                + "&" +$("#instruction_profile_form").serialize()+ "&" + $("#next_date_visit_form").serialize(),
        cache: false,
        success: function(response) {
            $('#research_modal').modal('hide');
            $('.content-wrapper').remove();
            $('#content-wrapper').append(response.result_html);
            $('.profile-table').remove();
            $('#profile_table').append(response.profile_table);
            ///////////////// initilize datatable //////////////
            $('.profiletable').DataTable({
                // "scrollX": true,
                "initComplete": function (settings, json) {
                    $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                }
            });
            $("#toggleresize1").click(function () {
                var icon = $('#toggleresize1 > .arro');
                icon.toggleClass('fa-arrow-left fa-arrow-right');
                $('.resize1').toggleClass("active_resize1");
                $('.resize2').toggleClass("inactive_resize2");

            });
            $("#toggleresize2").click(function () {
                var icon = $('#toggleresize2 > .arro');
                icon.toggleClass('fa-arrow-left fa-arrow-right');
                $('.resize2').toggleClass("active_resize2");
                $('.resize1').toggleClass("inactive_resize1");
            });
            $('#profiletable tbody tr:first').addClass('row_selected');
            $("#profiletable tbody tr").click(function (e) {
                $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '#history_item_tab', function(){
    $.ajax({
        url:window.location.origin+window.location.pathname+'profile_history/get_item_tab',
        cache: false,
        success: function(response){
            $('#history_items_content').empty();
            $('#history_items_content').append(response.result_html);
            $('.history_item_container').empty();
            $('.history_item_container').append(response.item_table);
        }
    });
});
$(document.body).on('click','#export_history_items',function(){
    $('.prof_his_id').prop('selectedIndex',0);
    $('#history_items').prop('selectedIndex',0);
});

$(document.body).on('click', '.edit_examination_category_modal', function(){
    $('#examination_category_modal_form')[0].reset();
    var cat_id = $(this).attr('data-examination-cat-id');
    $('#examination_cat_id').val($(this).attr('data-examination-cat-id'));
    $.ajax({
        url: window.location.origin+window.location.pathname+'examination/get_examination_cat_description',
        type: 'post',
        data: {id:cat_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#examination_cate_desc').val(response.description);
                $('#examination_category_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});
$(document.body).on('click', '#save_examination_category_description', function(){
    $.ajax({
        url: $('#examination_category_modal_form').attr('data-action'),
        type: 'post',
        data:  $('#examination_category_modal_form').serialize(),
        cache: false,
        success: function(response) {
            $('#examination_category_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '.edit_investigation_category_modal', function(){
    $('#investigation_category_modal_form')[0].reset();
    var cat_id = $(this).attr('data-investigation-cat-id');
    $('#investigation_cat_id').val($(this).attr('data-investigation-cat-id'));
    $.ajax({
        url: window.location.origin+window.location.pathname+'investigation/get_investigation_cat_description',
        type: 'post',
        data: {id:cat_id},
        cache: false,
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#investigation_cate_desc').val(response.description);
                $('#investigation_category_modal').modal('show');
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});
$(document.body).on('click', '#save_investigation_category_description', function(){
    $.ajax({
        url: $('#investigation_category_modal_form').attr('data-action'),
        type: 'post',
        data:  $('#investigation_category_modal_form').serialize(),
        cache: false,
        success: function(response) {
            $('#investigation_category_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

$(document.body).on('click', '#ettcheckbox', function(){
    if ($("#ettcheckbox").is(":checked")) {
        $("#sig-ett").prop("disabled",false);    
    }else{
        $("#sig-ett").prop("disabled","disabled");    
    }
});

$(document.body).on('click','#update_password',function(){
    $.ajax({
        url: $('#update_user_password').attr('data-action'),
        type: 'post',
        data: $('#update_user_password').serialize(),
        cache: false,
        success: function(response){
            $('#passwordmodal').modal('hide');
            if (response.success==true) {
                toastr["success"](response.message);
            }else{
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('click','.save_vitals',function(){
    var tr = $(this).closest('tr');
    var id = tr.find('.vital_id').text();
    var date_time = tr.find('.vital_date_time').val();
    var vital_bp = tr.find('.vital_bp').text();
    var pulse = tr.find('.vital_pulse').text();
    var temp = tr.find('.vital_temp').text();
    var vital_inr = tr.find('.vital_inr').text();
    var vital_rr = tr.find('.vital_rr').text();
    var patid = $('#pat_info option:selected').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'user/save_vitals',
        type: 'post',
        data: {
            patid:patid,
            datetime:date_time,
            bp:vital_bp,
            pulse:pulse,
            temp:temp,
            inr:vital_inr,
            rr:vital_rr
        },
        cache: false,
        success: function(response){
            $('#vital_rows').empty();
            $('#vital_rows').append(response.vital_rows);
            if (response.success==true) {
                toastr["success"](response.message);
            }else{
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('change','#pat_info',function(){
    var patid = $(this).val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'user/get_patient_vitals',
        type: 'post',
        data: {
            patid:patid
        },
        cache: false,
        success: function(response){
            $('#vital_rows').empty();
            $('#vital_rows').append(response.vital_rows);
        }
    });
});
$(document.body).on('click', '.delete_vital', function () {
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function (response) {
                $('#vital_rows').empty();
                $('#vital_rows').append(response.vital_rows);
                if (response.success == true) {
                    toastr["error"](response.message);
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

$(document.body).on('click','.update_vital',function(){
    var tr = $(this).closest('tr');
    var vital_id = tr.find('.vital_id').val();
    var date_time = tr.find('.vital_date_time').val();
    var vital_bp = tr.find('.vital_bp').text();
    var pulse = tr.find('.vital_pulse').text();
    var temp = tr.find('.vital_temp').text();
    var vital_inr = tr.find('.vital_inr').text();
    var vital_rr = tr.find('.vital_rr').text();
    var patid = $('#pat_info option:selected').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'user/update_vitals',
        type: 'post',
        data: {
            patid:patid,
            vitalid:vital_id,
            datetime:date_time,
            bp:vital_bp,
            pulse:pulse,
            temp:temp,
            inr:vital_inr,
            rr:vital_rr
        },
        cache: false,
        success: function(response){
            $('#vital_rows').empty();
            $('#vital_rows').append(response.vital_rows);
            if (response.success==true) {
                toastr["success"](response.message);
            }else{
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('click','.edit_user',function(){
    var tr = $(this).closest('tr');
    var username = tr.find('.username').text();
    $.ajax({
        url: window.location.origin+window.location.pathname+'setting/user_data_modal',
        type: 'post',
        data: {username:username},
        cache: false,
        success: function(response){
            $('#user_moda_contnt').empty();
            $('#user_moda_contnt').append(response.edit_modal);
            $('#useredit').modal('show');
        }
    });
});

$(document.body).on('click','.edit_user_data',function(){
     $.ajax({
        url: $('#update_registered_user_form').attr('data-action'),
        type: 'post',
        data: $('#update_registered_user_form').serialize(),
        cache: false,
        success: function(response){
            $('#useredit').modal('hide');
            $('.user_table_content').remove();
            $('#user_table_content').append(response.user_html);
            if (response.success==true) {
                toastr["success"](response.message);
            }else{
                toastr["error"](response.message);
            }
        }
    });
});

function deleteuser(object,userid,username){
    $.ajax({
        url: window.location.origin+window.location.pathname+'setting/delete_user',
        type: 'post',
        data: {
            userid: userid,
            username: username
        },
        cache: false,
        success: function(response){
            $('.user_table_content').remove();
            $('#user_table_content').append(response.user_html);
            if (response.success==true) {
                toastr["success"](response.message);
            }else{
                toastr["error"](response.message);
            }
        }
    });
}

$(document.body).on('click', '#ett_details_table tbody tr td:nth-child(4)', function () {
    $('#ett_details_table tbody tr td:nth-child(4)').removeClass('row_selected');
    $(this).addClass('row_selected');
    var etttestid = $('#ett_details_table tbody tr td:nth-child(4).row_selected').siblings('.etttestid').text();
    var patid = $('#ett_details_table tbody tr td:nth-child(4).row_selected').siblings('.patid').text();
    $.ajax({
        url: '/cms/print_profiles/get_ett_details',
        type: 'post',
        data: {
            testid:etttestid,
            patid:patid
        },
        success: function(response){
            $('.report_view').empty();
            $('.report_view').append(response.ett_print_html);
        }
    });
});

$(document.body).on('click', '#sp_details_table tbody tr td:nth-child(4)', function (){
    $('#sp_details_table tbody tr td:nth-child(4)').removeClass('row_selected');
    $(this).addClass('row_selected');
    var sptestid = $('#sp_details_table tbody tr td:nth-child(4).row_selected').siblings('.sptestid').text();
    var patid = $('#sp_details_table tbody tr td:nth-child(4).row_selected').siblings('.patid').text();
    $.ajax({
        url: '/cms/print_profiles/get_sp_details',
        type: 'post',
        data: {
            testid:sptestid,
            patid:patid
        },
        success: function(response){
            $('.report_view').empty();
            $('.report_view').append(response.sp_print_html);
        }
    });
});
$(document.body).on('click', '#lab_details_table tbody tr td:nth-child(4)', function (){
    $('#lab_details_table tbody tr td:nth-child(4)').removeClass('row_selected');
    $(this).addClass('row_selected');
    var labtestid = $('#lab_details_table tbody tr td:nth-child(4).row_selected').siblings('.labtestid').text();
    var patid = $('#lab_details_table tbody tr td:nth-child(4).row_selected').siblings('.patid').text();
    $.ajax({
        url: '/cms/print_profiles/get_lab_details',
        type: 'post',
        data: {
            testid:labtestid,
            patid:patid
        },
        success: function(response){
            $('.report_view').empty();
            $('.report_view').append(response.lab_print_html);
        }
    });
});
function exeminationpulse(val){
    var pulse = val.value;
    $('#examination_info_pulse').val(pulse);
}
function exeminationvolume(val){
    var volume = val.value;
    $('#examination_info_volume').val(volume);
}
function exeminationbpa(val){
    var bpa = val.value;
    $('#examination_info_bpa').val(bpa);
}
function exeminationbpb(val){
    var bpb = val.value;
    $('#examination_info_bpb').val(bpb);
}
function exeminationresp(val){
    var rr = val.value;
    $('#examination_resp_rate').val(rr);
}
function exeminationtemp(val){
    var temp = val.value;
    $('#examination_info_temp').val(temp);
}
function deleteExaminationDetail(editableObj,test_id,patient_id){
    if (confirm('Are you sure to delete this record?')) {
         $.ajax({
            url: '/cms/profile/delete_examination_test_details',
            type: 'post',
            data: {detail_id:test_id,patid:patient_id},
            cache: false,
            success: function (response) {
                if (response.success) {
                    $('#echo_detail_container').empty();
                    $('#echo_detail_container').append(response.examination_details);
                    if (response.success == true) {
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    }else{
        return false;
    }
}

function printexamination(editableObj,test_id,patient_id) {
    var win = window.open('/cms/print_profiles/print_examination/?testid=' + test_id +'&patid='+patient_id, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}

$(document.body).on('click', '#examination_details_table tbody tr td:nth-child(4)', function (){
    $('#examination_details_table tbody tr td:nth-child(4)').removeClass('row_selected');
    $(this).addClass('row_selected');
    var testid = $('#examination_details_table tbody tr td:nth-child(4).row_selected').siblings('.testid').text();
    var patid = $('#examination_details_table tbody tr td:nth-child(4).row_selected').siblings('.patid').text();
    $.ajax({
        url: '/cms/print_profiles/get_examination_details',
        type: 'post',
        data: {
            testid:testid,
            patid:patid
        },
        success: function(response){
            $('.report_view').empty();
            $('.report_view').append(response.examination_print_html);
        }
    });
});

function showEditexaminationDetail(editableObj,test_id,patient_id) {
    $.ajax({
        url: '/cms/profile/patient_examination_edit_detail',
        type: 'post',
        data: {detail_id:test_id,patid:patient_id},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy'
                });

                $('#profile_examination_container').empty();
                $('#profile_examination_container').append(response.examination_table);

                $('#profile_history_container').empty();
                $('#profile_history_container').append(response.history_table);

                $('#investigation_category_container').empty();
                $('#investigation_category_container').append(response.investigation_html);

                $('#advice_category_container').empty();
                $('#advice_category_container').append(response.advice_html);

                $('#instruction_category_container').empty();
                $('#instruction_category_container').append(response.instruction_html);

                $('#medicine_category_container').empty();
                $('#medicine_category_container').append(response.medicine_html);

                $('#pat_ett_information').empty();
                $('#pat_ett_information').append(response.patient_information);
            }
        }
    });
}