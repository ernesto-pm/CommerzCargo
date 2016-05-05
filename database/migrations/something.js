<script src="//ajax.googleapis.com/ajax/libs/dojo/1.8.0/dojo/dojo.js"></script>
<script type="text/javascript" language="javascript">
  jQuery(document).ready(function ($) {
//--$("#self_reg_form_holder").hide();
    $("#self_enroll_form_holder").hide();
    $("#register-email").click(function() {
//--    self_register();
        self_enroll();
    });

    });

//-- function self_register(){
     function self_enroll(){
          var contextID = 0 /********TODO: ASSIGN********/;
          var email = document.getElementById('email');
          if(email != undefined && check_email(email.value)){
               require(['dojo/request/script'], function(reqScript){
//--              reqScript.get('http://sandbox.meemli.com/recommend/self_submit/' + encodeURIComponent(email.value),{})
                  reqScript.get('http://sandbox.meemli.com/enrollment/self_enroll/' + encodeURIComponent(email.value) + '/' + contextID,{})
                             .then(function() {},
                             function(err) { alert(err); }
                        );
                  });
            }
      }

//--  function callback_self_reg(resp){
      function callback_self_enroll(resp){
            if(resp != undefined){
                  if(resp.rc == 0){// Everything was fine
//--                    document.getElementById('self_reg_form_holder').innerHTML = resp.msg;
                        document.getElementById('self_enroll_form_holder').innerHTML = resp.msg;
//--                    jQuery("#self_reg_form_holder").fadeIn();
                        jQuery("#self_enroll_form_holder").fadeIn();

                  }else{
                        alert(resp.msg);
                  }
            }else{
                  alert('An unknown error occured');
            }
      }

      function check_email(email){
            //to do
            return true;
      }

</script>
