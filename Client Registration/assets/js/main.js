$(document).ready(function(){

    errorfst_name = true;
    errormid_name = false;
    errorlast_name = true;
    errorstud_num = true;
    errorclient_email = true;
    errorpassword = true;
    errorCpassword = true;
    errorbday = true;
    genderError = true;
    erroradd = true;
    errorclient_contact = true;
    errorguar_name = true;
    errorguardian_contact = true;

    $('#fst_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#fst_name').val())) {
            errorfst_name = false;
            $('#input_fst_name').removeClass('input-error');
            $('#i_fst_name').removeClass('fas fa-exclamation-circle');
        } else {
            errorfst_name = true;
            $('#input_fst_name').addClass('input-error');
            $('#i_fst_name').addClass('fas fa-exclamation-circle');
        }
    })
    $('#mid_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#mid_name').val())) {
            errormid_name = false;
            $('#input_mid_name').removeClass('input-error');
            $('#i_mid_name').removeClass('fas fa-exclamation-circle');
        } else if($('#mid_name').val() == 0){
            errormid_name = false;
            $('#input_mid_name').removeClass('input-error');
            $('#i_mid_name').removeClass('fas fa-exclamation-circle');
        } else {
            errormid_name = true;
            $('#input_mid_name').addClass('input-error');
            $('#i_mid_name').addClass('fas fa-exclamation-circle');
        }
    })
    $('#last_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#last_name').val())) {
            errorlast_name = false;
            $('#input_last_name').removeClass('input-error');
            $('#i_last_name').removeClass('fas fa-exclamation-circle');
        } else {
            errorlast_name = true;
            $('#input_last_name').addClass('input-error');
            $('#i_last_name').addClass('fas fa-exclamation-circle');
        }
    })

    $('#stud_num').blur(function(){
        if($('#stud_num').val().length == 15){
            errorstud_num = false;
            $('#input_stud_num').removeClass('input-error');
            $('#i_stud_num').removeClass('fas fa-exclamation-circle');
        } else {
            errorstud_num = true;
            $('#input_stud_num').addClass('input-error');
            $('#i_stud_num').addClass('fas fa-exclamation-circle');
        }
    })


    $('#client_email').blur(function(){
        var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
        if(regexp.test($('#client_email').val())) {
            errorclient_email = false;
            $('#input_client_email').removeClass('input-error');
            $('#i_client_email').removeClass('fas fa-exclamation-circle');
        }else if($('#client_email').val().length == 0){
            errorclient_email = true;
            $('#input_client_email').addClass('input-error');
            $('#i_client_email').addClass('fas fa-exclamation-circle');
        }
         else {
            errorclient_email = true;
            $('#input_client_email').addClass('input-error');
            $('#i_client_email').addClass('fas fa-exclamation-circle');
        }
    })

    $('#password').keyup(function(){
        var regexp = /^[a-zA-Z0-9]{8,32}$/;
        if(regexp.test($('#password').val())) {
            errorpassword = false;
            $('#input_password').removeClass('input-error');
            $('#i_password').removeClass('fas fa-exclamation-circle');
        } else {
            errorpassword = true;
            $('#input_password').addClass('input-error');
            $('#i_password').addClass('fas fa-exclamation-circle');
        }
    })

    $('#cpassword').blur(function(){
        var regexp = /^[a-zA-Z0-9]{8,32}$/;
        if(regexp.test($('#cpassword').val())) {
            if($('#cpassword').val() == $('#password').val()) {
                errorCpassword = false;
                $('#input_cpassword').removeClass('input-error');
                $('#i_cpassword').removeClass('fas fa-exclamation-circle');
            } else {
                errorCpassword = true;
                $('#input_cpassword').addClass('input-error');
                $('#i_cpassword').addClass('fas fa-exclamation-circle');
            }
        } else {
            errorCpassword = true;
            $('#input_cpassword').addClass('input-error');
            $('#i_cpassword').addClass('fas fa-exclamation-circle');
        }
    })

    $("#gender").blur(function(){ 
        if($("#gender").val() == 0){
            genderError = true;
            $('#input_gender').addClass('input-error');
            $('#i_gender').addClass('fas fa-exclamation-circle');
        }else{
            genderError = false;
            $('#input_gender').removeClass('input-error');
            $('#i_gender').removeClass('fas fa-exclamation-circle');
        }
    });

    $('#bday').blur(function(){
        var bdayVal = $('#bday').val();
        if(Date.parse(bdayVal)){
            errorbday = false;
            $('#input_bday').removeClass('input-error');
            $('#i_bday').removeClass('fas fa-exclamation-circle');
        } else {
            errorbday = true;
            $('#input_bday').addClass('input-error');
            $('#i_bday').addClass('fas fa-exclamation-circle');
        }
    })

    $('#add').blur(function(){
        if($('#add').val().length > 0){
            erroradd = false;
            $('#input_add').removeClass('input-error');
            $('#i_add').removeClass('fas fa-exclamation-circle');
        } else {
            erroradd = true;
            $('#input_add').addClass('input-error');
            $('#i_add').addClass('fas fa-exclamation-circle');
        }
    })
    
    $('#client_contact').keyup(function(){
        var regexp = /^[0-9]{11}$/;
        if(regexp.test($('#client_contact').val())) {
            errorclient_contact = false;
            $('#input_client_contact').removeClass('input-error');
            $('#i_client_contact').removeClass('fas fa-exclamation-circle');
        } else {
            errorclient_contact = true;
            $('#input_client_contact').addClass('input-error');
            $('#i_client_contact').addClass('fas fa-exclamation-circle');
        }
    })
    $('#guar_name').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#guar_name').val())) {
            errorguar_name = false;
            $('#input_guar_name').removeClass('input-error');
            $('#i_guar_name').removeClass('fas fa-exclamation-circle');
        }
        else if($('#guar_name').val() == 0){
            errorguar_name = false;
            $('#input_guar_name').removeClass('input-error');
            $('#i_guar_name').removeClass('fas fa-exclamation-circle');
        }
         else {
            errorguar_name = true;
            $('#input_guar_name').addClass('input-error');
            $('#i_guar_name').addClass('fas fa-exclamation-circle');
        }
    })
    $('#guardian_contact').keyup(function(){
        var regexp = /^[0-9]{11}$/;
        if(regexp.test($('#guardian_contact').val())) {
            errorguardian_contact = false;
            $('#input_guardian_contact').removeClass('input-error');
            $('#i_guardian_contact').removeClass('fas fa-exclamation-circle');
        } else {
            errorguardian_contact = true;
            $('#input_guardian_contact').addClass('input-error');
            $('#i_guardian_contact').addClass('fas fa-exclamation-circle');
        }
    })


    $("#viewPass").click(function () {
        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
            $('#viewPass').removeClass('fas fa-eye');
            $('#viewPass').addClass('fas fa-eye-slash');
        } else {
            $("#password").attr("type", "password");
            $('#viewPass').removeClass('fas fa-eye-slash');
            $('#viewPass').addClass('fas fa-eye');
            
        }
    });

    $("#viewCPass").click(function () {
        if ($("#cpassword").attr("type") === "password") {
            $("#cpassword").attr("type", "text");
            $('#viewCPass').removeClass('fas fa-eye');
            $('#viewCPass').addClass('fas fa-eye-slash');
        } else {
            $("#cpassword").attr("type", "password");
            $('#viewCPass').removeClass('fas fa-eye-slash');
            $('#viewCPass').addClass('fas fa-eye');
            
        }
    });

    $("#registration").submit(function(event){
        event.preventDefault();

        if(errorfst_name == true){
            $('#input_fst_name').addClass('input-error');
            $('#i_fst_name').addClass('fas fa-exclamation-circle');
        }
        if(errorlast_name == true){
            $('#input_last_name').addClass('input-error');
            $('#i_last_name').addClass('fas fa-exclamation-circle');
        }
        if(errorstud_num == true){
            $('#input_stud_num').addClass('input-error');
            $('#i_stud_num').addClass('fas fa-exclamation-circle');
        }
        if(errorclient_email == true){
            $('#input_client_email').addClass('input-error');
            $('#i_client_email').addClass('fas fa-exclamation-circle');
        }
        if(errorpassword == true){
            $('#input_password').addClass('input-error');
            $('#i_password').addClass('fas fa-exclamation-circle');
        }
        if(errorCpassword == true){
            $('#input_cpassword').addClass('input-error');
            $('#i_cpassword').addClass('fas fa-exclamation-circle');
        }
        if(genderError == true){
            $('#input_gender').addClass('input-error');
            $('#i_gender').addClass('fas fa-exclamation-circle');
        }
        if(errorbday == true){
            $('#input_bday').addClass('input-error');
            $('#i_bday').addClass('fas fa-exclamation-circle');
        }
        if(erroradd == true){
            $('#input_add').addClass('input-error');
            $('#i_add').addClass('fas fa-exclamation-circle');
        }
        if(errorclient_contact == true){
            $('#input_client_contact').addClass('input-error');
            $('#i_client_contact').addClass('fas fa-exclamation-circle');
        }
        if(errorguar_name == true){
            $('#input_guar_name').addClass('input-error');
            $('#i_guar_name').addClass('fas fa-exclamation-circle');
        }
        if(errorguardian_contact == true){
            $('#input_guardian_contact').addClass('input-error');
            $('#i_guardian_contact').addClass('fas fa-exclamation-circle');
        }

        if(errorfst_name == false && errormid_name == false && errorlast_name == false && errorstud_num == false && errorclient_email == false && 
            genderError == true && errorpassword == false && errorCpassword == false && errorbday == false && erroradd == false && errorclient_contact == false && 
            errorguar_name == false && errorguardian_contact == false){
            $.ajax({
                url: "assets/client_registration_process.php",
                type: 'POST',
                data: $('#registration').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    window.location='../Client Login/';
                    $("#registration")[0].reset();
                }
            });
            $("#registration")[0].reset();
            
        } else{


        }
        

    })


    

});


