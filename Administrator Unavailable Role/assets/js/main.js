$(document).ready(function(){
    var errorstud_num = true;
    var errorpassword = true;
    var errorTextStudNum = 0;
    var errorTextPass = 0;
    $('#error_username').hide();
    $('#error_pass').hide();
    $('#error_acc').hide();


    $('#username').keyup(function(){
        if( $('#username').val() !== '' ){
            errorstud_num = false;
            errorTextStudNum = 0;
            $('#input_username').removeClass('input-error');
            $('#i_username').removeClass('fas fa-exclamation-circle');

            $('#error_username').hide();
            $('#error_username').text("");

            $('#error_acc').hide();
            $('#error_acc').text("");

            if( errorstud_num == false && errorpassword == false ){
                $('#error_message').removeClass('input-error');
            }

        }
        else {
            errorstud_num = true;
            errorTextStudNum = 1;
        }
    })

    $('#password').keyup(function(){
        if( $('#password').val() !== '' ){
            errorTextPass = 0;
            errorpassword = false;
            $('#input_password').removeClass('input-error');
            $('#i_password').removeClass('fas fa-exclamation-circle');

            $('#error_pass').hide();
            $('#error_pass').text("");

            $('#error_acc').hide();
            $('#error_acc').text("");

            if( errorstud_num == false && errorpassword == false ){
                $('#error_message').removeClass('input-error');
            }
        } 
        else {
            errorpassword = true;
            errorTextPass = 1;
            
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


    $('#loginForm').submit(function(event){
        event.preventDefault();
        $('#error_message').removeClass('input-error');

        if(errorstud_num = true && errorTextStudNum == 1){
            $('#input_username').addClass('input-error');
            $('#i_username').addClass('fas fa-exclamation-circle');
            
            $('#error_username').show();
            $('#error_username').text("Please Enter Your Student Number");
            $('#error_message').removeClass('input-error');

        } 

        if(errorpassword = true && errorTextPass == 1){
            $('#input_password').addClass('input-error');
            $('#i_password').addClass('fas fa-exclamation-circle');

            $('#error_pass').show();
            $('#error_pass').text(" Please Enter Your Password");
            $('#error_message').removeClass('input-error');
        }

        if(errorstud_num == false && errorpassword == false){
            $.ajax({
                url: "assets/admin_login_work.php",
                type: 'POST',
                data: $('#loginForm').serialize(),
                datatype: "json",
                cache:false,
                success:function(result){
                    if(result == 'exists'){
                        $("#loginForm")[0].reset();
                        $('#error_acc').hide();
                        window.location='../Administrator/Counceling Dashboard/';
                    }
                    else{
                        $('#error_acc').show();
                        $("#error_acc").text('Incorrect Username or Password');

                        $('#input_username').addClass('input-error');
                        $('#i_username').addClass('fas fa-exclamation-circle');

                        $('#input_password').addClass('input-error');
                        $('#i_password').addClass('fas fa-exclamation-circle');

                        $('#error_message').addClass('input-error');
                    }
                    
                }
            });

        }

        if(errorpassword == true || errorstud_num == true){
            $('#error_message').addClass('input-error');
        }

    })


});