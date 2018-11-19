
<script type="text/javascript">

   $('li #list_itmes_profession').click(function(){
   	    get_professions($(this).attr('data-func-call'));
   });

   $('li #list_itmes_diestrict').click(function(){
       get_districts($(this).attr('data-func-call'));
   });

   $('li #list_itmes_history').click(function(){
        get_history($(this).attr('data-func-call'));
   });

   $('li #list_itmes_examination').click(function(){
       get_examinations($(this).attr('data-func-call'));
   });

   $('li #list_itmes_investigation').click(function(){
       get_investigations($(this).attr('data-func-call'));
   });

   $('li #list_itmes_recommendation').click(function(){
        get_recommendations($(this).attr('data-func-call'));
   });

   $('#list_itmes_instruction').click(function(){
        get_instructions($(this).attr('data-func-call'));
   });

   $('#list_itmes_echo_index').click(function(){
        get_echo($(this).attr('data-func-call'));
   });

   $('#list_itmes_medicine').click(function(){
        get_medicine($(this).attr('data-func-call'));
   });

   $('#list_itmes_employee_cat').click(function(){
    employee_categories($(this).attr('data-func-call'));
   });

   $('#list_itmes_employee_department').click(function(){
      emp_department($(this).attr('data-func-call'));
   });

   $('#list_itmes_ett').click(function(){
      get_ett($(this).attr('data-func-call'));
   });

   $('#list_itmes_advice').click(function(){
       get_advice($(this).attr('data-func-call'));
   });

   $('#list_itmes_research').click(function(){
      get_research($(this).attr('data-func-call'));
   });

   $('#list_itmes_manage_research').click(function(){
      get_manage_reasearch($(this).attr('data-func-call'));
   });

   $('#list_itmes_academic_sessions').click(function(){
      academic_session($(this).attr('data-func-call'));
   });

   $('#list_itmes_register_user').click(function(){
      get_register_user($(this).attr('data-func-call'));
   });

   $('#list_itmes_permission').click(function(){
      get_list_permission($(this).attr('data-func-call'));
   });

   $('#list_itmes_delete_patient').click(function(){
      get_delete_patients($(this).attr('data-func-call'));
   });

   $('#list_itmes_limiter').click(function(){
      get_item_limiter($(this).attr('data-func-call'));
   });

   $('#list_itmes_laboratory_test').click(function(){
       get_laboratory_test($(this).attr('data-func-call'));
   });

   $('#list_itmes_special_instructions').click(function(){
       grade_special_instruction($(this).attr('data-func-call'));
   });

   $('#list_itmes_signature').click(function(){
       get_items_signature($(this).attr('data-func-call'));
   });

   $('#list_itmes_batches').click(function(){
       get_batches($(this).attr('data-func-call'));
   });

   $('#list_itmes_subjects').click(function(){
       get_subjects($(this).attr('data-func-call'));
   });

   $('#list_itmes_Calendar').click(function(){
       get_calendar($(this).attr('data-func-call'));
   });

   $('#list_itmes_events').click(function(){
       get_events($(this).attr('data-func-call'));
   });

   $('#list_itmes_sms').click(function(){
       get_sms($(this).attr('data-func-call'));
   });

   $('#list_itmes_fee_management').click(function(){
       get_fee_management($(this).attr('data-func-call'));
   });

   $('#list_itmes_income_expanse').click(function(){
       get_income_expanse($(this).attr('data-func-call'));
   });

   $('#list_itmes_vital').click(function(){
       get_vitals($(this).attr('data-func-call'));
   });

   $(document).ready(function(){
      $("#list_itmes_").click(function(){
        $(this).children('ul').show();
        $('#list_itmes_clinical ul').hide();
        $('#list_itmes_setting ul').hide();
      });
      $("#list_itmes_clinical").click(function(){
        $('#list_itmes_ ul').hide();
        $(this).children('ul').show();
        $('#list_itmes_setting ul').hide();
      });
      $("#list_itmes_setting").click(function(){
        $('#list_itmes_ ul').hide();
        $('#list_itmes_clinical ul').hide();
        $(this).children('ul').show();
      });
       $(".sidebar-menu .components li ul li").click(function() {
          $(".sidebar-menu .components li ul li.active").removeClass('active');
            $(this).addClass('active');
        });
   });

</script>
<?php 
   echo $menu_result;
?>