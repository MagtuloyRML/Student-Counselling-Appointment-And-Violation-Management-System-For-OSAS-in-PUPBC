$(document).ready(function(){
    errorpass = true;
    errorpassword = true;
    errorCpassword = true;

    $('#saveInfo').attr('disabled', 'disabled');
    $('#saveInfo').addClass('disable');

    $('#prepass').blur(function(){
        if($('#prepass').val().length > 0){
            errorpass = false;
            $('#prepass').removeClass('input-error');
            $('#i_prepass').removeClass('fas fa-exclamation-circle');
        } else {
            errorpass = true;
            $('#prepass').addClass('input-error');
            $('#i_prepass').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#npass').keyup(function(){
        var regexp = /^[a-zA-Z0-9]{8,32}$/;
        if(regexp.test($('#npass').val())) {
            errorpassword = false;
            $('#npass').removeClass('input-error');
            $('#i_npass').removeClass('fas fa-exclamation-circle');
        } else {
            errorpassword = true;
            $('#npass').addClass('input-error');
            $('#i_npass').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#conpass').blur(function(){
        var regexp = /^[a-zA-Z0-9]{8,32}$/;
        if(regexp.test($('#conpass').val())) {
            if($('#conpass').val() == $('#npass').val()) {
                errorCpassword = false;
                $('#conpass').removeClass('input-error');
                $('#i_conpass').removeClass('fas fa-exclamation-circle');
            } else {
                errorCpassword = true;
                $('#conpass').addClass('input-error');
                $('#i_conpass').addClass('fas fa-exclamation-circle');
            }
        } else {
            errorCpassword = true;
            $('#conpass').addClass('input-error');
            $('#i_conpass').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    

    $("#viewPass").click(function () {
        if ($("#prepass").attr("type") === "password") {
            $("#prepass").attr("type", "text");
            $('#viewPass').removeClass('fas fa-eye');
            $('#viewPass').addClass('fas fa-eye-slash');
        } else {
            $("#prepass").attr("type", "password");
            $('#viewPass').removeClass('fas fa-eye-slash');
            $('#viewPass').addClass('fas fa-eye');
            
        }
    });
    $("#viewPass1").click(function () {
        if ($("#npass").attr("type") === "password") {
            $("#npass").attr("type", "text");
            $('#viewPass1').removeClass('fas fa-eye');
            $('#viewPass1').addClass('fas fa-eye-slash');
        } else {
            $("#npass").attr("type", "password");
            $('#viewPass1').removeClass('fas fa-eye-slash');
            $('#viewPass1').addClass('fas fa-eye');
            
        }
    });
    $("#viewPass2").click(function () {
        if ($("#conpass").attr("type") === "password") {
            $("#conpass").attr("type", "text");
            $('#viewPass2').removeClass('fas fa-eye');
            $('#viewPass2').addClass('fas fa-eye-slash');
        } else {
            $("#conpass").attr("type", "password");
            $('#viewPass2').removeClass('fas fa-eye-slash');
            $('#viewPass2').addClass('fas fa-eye');
            
        }
    });


    $("#editInfo").submit(function(event){
        event.preventDefault();

        if(errorpass == false && errorpassword == false && errorCpassword == false){
            $.ajax({
                url: "assets/updateInfo.php",
                type: 'POST',
                data: $('#editInfo').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if( result == "Data Inserted"){
                        window.location='../Client Edit Account Configuration/';

                    }
                    else if( result == "something is wrong"){
                        alert ("mali");
                    }
                }
            });
        } else{


        }
        

    })



});