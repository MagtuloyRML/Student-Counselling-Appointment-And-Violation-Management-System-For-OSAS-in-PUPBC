$(document).ready(function(){
    $("#submit").attr("disabled", true);
    $("#submit").removeClass('bttn');
    $("#submit").addClass('disable');

    errorfst_name = true;
    errormid_name = false;
    errorlast_name = true;
    userRoleError = true;
    admin_emailError = true;
    usernameError = true;
    erroradd = true;
    genderError = true;
    admin_contactError = true;
    

    $('#fst_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#fst_name').val())) {
            errorfst_name = false;
            $("#i_fst_name").removeClass('fa-circle-exclamation');
        } else {
            errorfst_name = true;
            $("#i_fst_name").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })
    $('#mid_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#mid_name').val())) {
            errormid_name = false;
            $("#i_mid_name").removeClass('fa-circle-exclamation');
        } else if($('#mid_name').val() == 0){
            errormid_name = false;
            $("#i_mid_name").removeClass('fa-circle-exclamation');
        } else {
            errormid_name = true;
            $("#i_mid_name").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })
    $('#last_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#last_name').val())) {
            errorlast_name = false;
            $("#i_last_name").removeClass('fa-circle-exclamation');
        } else {
            errorlast_name = true;
            $("#i_last_name").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $("#userRole").change(function(){ 
        if($("#userRole").val() == 0){
            userRoleError = true;
            $("#i_userRole").addClass('fa-circle-exclamation');
        }else{
            userRoleError = false;
            $("#i_userRole").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $('#admin_email').blur(function(){
        var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
        if(regexp.test($('#admin_email').val())) {
            admin_emailError = false;
            $("#i_admin_email").removeClass('fa-circle-exclamation');
        }else if($('#admin_email').val().length == 0){
            admin_emailError = true;
            $("#i_admin_email").addClass('fa-circle-exclamation');
        }
         else {
            admin_emailError = true;
            $("#i_admin_email").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $('#username').blur(function(){
        if($('#username').val().length > 0){
            usernameError = false;
            $("#i_username").removeClass('fa-circle-exclamation');
        } else {
            usernameError = true;
            $("#i_username").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $('#add').blur(function(){
        if($('#add').val().length > 0){
            erroradd = false;
            $("#i_add").removeClass('fa-circle-exclamation');
        } else {
            erroradd = true;
            $("#i_add").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $("#gender").change(function(){ 
        if($("#gender").val() == 0){
            genderError = true;
            $("#i_gender").addClass('fa-circle-exclamation');
        }else{
            genderError = false;
            $("#i_gender").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });
    
    $('#admin_contact').keyup(function(){
        var regexp = /^[0-9]{11}$/;
        if(regexp.test($('#admin_contact').val())) {
            admin_contactError = false;
            $("#i_admin_contact").removeClass('fa-circle-exclamation');
        } else {
            admin_contactError = true;
            $("#i_admin_contact").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $("#addUser").submit(function(event){
        event.preventDefault();
        if(errorfst_name == true){
            $("#i_fst_name").addClass('fa-circle-exclamation');
        }

        if(errormid_name == true){
            $("#i_mid_name").addClass('fa-circle-exclamation');
        }

        if(errorlast_name == true){
            $("#i_last_name").addClass('fa-circle-exclamation');
        }

        if(userRoleError == true){
            $("#i_userRole").addClass('fa-circle-exclamation');
        }

        if(admin_emailError == true){
            $("#i_admin_email").addClass('fa-circle-exclamation');
        }

        if(usernameError == true){
            $("#i_username").addClass('fa-circle-exclamation');
        }

        if(erroradd == true){
            $("#i_add").addClass('fa-circle-exclamation');
        }

        if(genderError == true){
            $("#i_gender").addClass('fa-circle-exclamation');
        }

        if(admin_contactError == true){
            $("#i_admin_contact").addClass('fa-circle-exclamation');
        }

        if(errorfst_name == false && errormid_name == false && errorlast_name == false && userRoleError == false && admin_emailError == false &&
            usernameError == false && erroradd == false && genderError == false && admin_contactError == false ){
                $.ajax({
                    url: "assets/addUser.php",
                    type: 'POST',
                    data: $('#addUser').serialize(),
                    datatype: "text",
                    cache:false,
                    success:function(result){
                        if(result = "success"){
                            $("#addUser")[0].reset();
                            
                        }
                        
                    }
                });
        }
            
    })
});

