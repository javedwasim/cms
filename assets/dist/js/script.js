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
    var name = $('#instruction_name').val();
    $.ajax({
        url: '/cms/examination/add_examination_category',
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
            $('#instruction_name').val('');
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
    $.ajax({
        url: $('#examination_item_form').attr('data-action'),
        type: 'post',
        data: $('#examination_item_form').serialize(),
        cache: false,
        success: function(response) {
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
    $('#investigation_item_form')[0].reset();
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
            $('#add_description').val('');
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
    var name = $('#medicine_name').val();
    $.ajax({
        url: '/cms/medicine/add_medicine_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.medicine_category_container').empty();
            $('.medicine_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});


$(document.body).on('click', '.delete-medicine', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.medicine_category_container').empty();
                $('.medicine_category_container').append(response.result_html);
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
    $.ajax({
        url: $('#medicine_item_form').attr('data-action'),
        type: 'post',
        data: $('#medicine_item_form').serialize(),
        cache: false,
        success: function(response) {
            $('.medicine_item_container').empty();
            $('.medicine_item_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
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
                toastr["error"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.add-dosage-category', function(){
    var name = $('#dosage_name').val();
    $.ajax({
        url: '/cms/medicine/add_dosage_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.dosage_category_container').empty();
            $('.dosage_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
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
    var name = $('#disease').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_disease_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.disease_category_container').empty();
            $('.disease_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-disease', function(){
    if (confirm('Are you sure to delete this record?')) {
        $.ajax({
            url: $(this).attr('data-href'),
            cache: false,
            success: function(response) {
                $('.disease_category_container').empty();
                $('.disease_category_container').append(response.result_html);
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

$(document.body).on('click', '.add-structure-category', function(){
    var name = $('#structure').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/add_structure_category',
        type: 'post',
        data: {name:name},
        cache: false,
        success: function(response) {
            $('.structure_category_container').empty();
            $('.structure_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
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
            $('.structure_finding_container').empty();
            $('.structure_finding_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
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
   var disease_id = $('#assign_disease_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/assign_finding_to_disease',
        type: 'post',
        data: {finding_id:finding_id,disease_id:disease_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["error"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
});

$(document.body).on('click', '.diagnose_radio', function(){
    var diagnose_id = $(this).attr('data-diagnose-id');
    var disease_id = $('#assign_disease_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'echo_controller/assign_diagnose_to_disease',
        type: 'post',
        data: {disease_id:disease_id,diagnose_id:diagnose_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                toastr["error"](response.message);
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
            $('.main_category_container').empty();
            $('.main_category_container').append(response.result_html);
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
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
            if (response.success) {
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

$(document.body).on('click', '#save_ett_test', function(){
    var patientid = $('#label_patient_id').text();
    var testreason = $('#ett_test_reason option:selected').val();
    var medication = $('#ett_medication').val();
    var description = $('#ett_desc_pro').val();
    var conclusion = $('#ett_conc_pro').val();
    var restinghr = $('#resting_hr').val();
    var restingbpa = $('#resting_bp_a').val();
    var restingbpb = $('#resting_bp_b').val();
    var maxhr = $('#max_hr').val();
    var maxbpa = $('#max_bp_a').val();
    var maxbpb = $('#max_bp_b').val();
    var maxpretar = $('#max_pre_tar').val();
    var maxprehr = $('#max_pre_hr').val();
    var hrbp = $('#hr_bp').val();
    var ettmets = $('#ett_mets').val();
    var exercisetime = $('#exercise_time').val();
    var endingreason = $('#ett_ending_reason').val();
    var ettprotocolid = $('#ett_protocol_id option:selected').val();
    $.ajax({
        url: '/cms/profile/save_ett_test',
        type: 'post',
        data: {
            patientid:patientid,
            testreason:testreason,
            medication:medication,
            description:description,
            conclusion:conclusion,
            restinghr:restinghr,
            restingbpa:restingbpa,
            restingbpb:restingbpb,
            maxhr:maxhr,
            maxbpa:maxbpa,
            maxbpb:maxbpb,
            maxpretar:maxpretar,
            maxprehr:maxprehr,
            hrbp:hrbp,
            ettmets:ettmets,
            exercisetime:exercisetime,
            endingreason:endingreason,
            ettprotocolid:ettprotocolid

        },
        cache: false,
        success: function(response){
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