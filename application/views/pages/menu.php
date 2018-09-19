<script type="text/javascript">
   $('#expList > li').click(function(e){
      e.stopPropagation();
      if(this.getElementsByTagName("ul")[0].style.display == 'block'){
        $(this).find("ul").slideUp();
    }
      else{
        $(this).find("ul").slideDown();
    }
    });

   /////////////// Add student /////////////////////
   $('li #list_itmes_profession').click(function(){
   	    get_professions($(this).attr('data-func-call'));
   });
      /////////////// student fields  /////////////////////
   $('li #list_itmes_diestrict').click(function(){
       get_districts($(this).attr('data-func-call'));
   });
      /////////////// student categories  ////////////////
   $('li #list_itmes_history').click(function(){
        get_history($(this).attr('data-func-call'));
   });
    /////////////// Search Students /////////////////////
   $('li #list_itmes_examination').click(function(){
       get_examinations($(this).attr('data-func-call'));
   });
    /////////////// Search Students /////////////////////
   $('li #list_itmes_investigation').click(function(){
       get_investigations($(this).attr('data-func-call'));
   });
    /////////////// Add employee /////////////////////
   $('li #list_itmes_recommendation').click(function(){
        get_recommendations($(this).attr('data-func-call'));
   });
      /////////////// Search guardians /////////////////////
   $('#list_itmes_instruction').click(function(){
        get_instructions($(this).attr('data-func-call'));
   });
    /////////////// attendance register /////////////////////
   $('#list_itmes_ett').click(function(){
        get_ett($(this).attr('data-func-call'));
   });
  /////////////// attendance register ///////////////////
   $('#list_itmes_echo_index').click(function(){
        get_echo($(this).attr('data-func-call'));
   });

   /////////////// employee profile fields ///////////////////
   $('#list_itmes_employee_profile_fields').click(function(){
    emp_fields($(this).attr('data-func-call'));
   });
   /////////////// employee categories ///////////////////
   $('#list_itmes_employee_cat').click(function(){
    employee_categories($(this).attr('data-func-call'));
   });

   /////////////// employee deparment ///////////////////
   $('#list_itmes_employee_department').click(function(){
      emp_department($(this).attr('data-func-call'));
   });

    /////////////// employee positions ///////////////////
   $('#list_itmes_ett').click(function(){
      get_ett($(this).attr('data-func-call'));
   });

   ///////////////// classes ////////////////////////////
   $('#list_itmes_advice').click(function(){
       get_advice($(this).attr('data-func-call'));
   });

  /////////////// institution details ///////////////////
   $('#list_itmes_research').click(function(){
      get_research($(this).attr('data-func-call'));
   });

  /////////////// subject names ///////////////////
   $('#list_itmes_manage_research').click(function(){
      get_manage_reasearch($(this).attr('data-func-call'));
   });

  /////////////// academic session ///////////////////
   $('#list_itmes_academic_sessions').click(function(){
      academic_session($(this).attr('data-func-call'));
   });

     /////////////// institution bank accounts ///////////////////
   $('#list_itmes_register_user').click(function(){
      get_register_user($(this).attr('data-func-call'));
   });

    /////////////// fee type ///////////////////
   $('#list_itmes_permission').click(function(){
      get_list_permission($(this).attr('data-func-call'));
   });

   /////////////// custom payment method ///////////////////
   $('#list_itmes_delete_patient').click(function(){
      get_delete_patients($(this).attr('data-func-call'));
   });

    /////////////// custom payment method ///////////////////
   $('#list_itmes_limiter').click(function(){
      get_item_limiter($(this).attr('data-func-call'));
   });

   /////////////// assessment categories ///////////////////
   $('#list_itmes_laboratory_test').click(function(){
       get_laboratory_test($(this).attr('data-func-call'));
   });

   /////////////// assessment grade scales ///////////////////
   $('#list_itmes_special_instructions').click(function(){
       grade_special_instruction($(this).attr('data-func-call'));
   });

   /////////////// assessment learning domain ///////////////////
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

   $(document).ready(function()
   {
       $('#expList li').click(function(e)
       {
           if(this.id!='list_itmes_'){
               $( "li" ).removeClass( "active nav-link" );
               $( "#"+this.id ).addClass( "active nav-link" );
           }

       });
   });

   $(".list-unstyled li").click(function (e) {
         e.stopPropagation();
         $(this).children('ul').toggle();
    });

</script>

<?php echo $menu_result;