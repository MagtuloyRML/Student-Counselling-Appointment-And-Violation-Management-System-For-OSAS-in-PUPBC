$(document).ready(function(){

    erroradd = false;
    errorcNom = false;
    errorcguard = false;
    errorcguardNum = false;
    erroremail = false;

    $('#saveInfo').attr('disabled', 'disabled');
    $('#saveInfo').addClass('disable');

    $('#email').keyup(function(){
        var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
        if(regexp.test($('#email').val())) {
            erroremail = false;
            $('#email').removeClass('input-error');
            $('#i_email').removeClass('fas fa-exclamation-circle');
        }else if($('#email').val().length == 0){
            erroremail = true;
            $('#email').addClass('input-error');
            $('#i_email').addClass('fas fa-exclamation-circle');
        }
         else {
            erroremail = true;
            $('#email').addClass('input-error');
            $('#i_email').addClass('fas fa-exclamation-circle');
        }

        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#add').keyup(function(){
        if( $('#add').val().length !== '' ){
            erroradd = false;
            $('#add').removeClass('input-error');
            $('#i_add').removeClass('fa-exclamation-circle');
        }
        else {
            erroradd = true;
            $('#add').addClass('input-error');
            $('#i_add').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#cNom').keyup(function(){
        if( $('#cNom').val().length !== '' ){
            errorcNom = false;
            $('#cNom').removeClass('input-error');
            $('#i_cNom').removeClass('fa-exclamation-circle');
        }
        else {
            errorcNom = true;
            $('#cNom').addClass('input-error');
            $('#i_cNom').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#cguard').keyup(function(){
        if( $('#cguard').val().length !== '' ){
            errorcguard = false;
            $('#cguard').removeClass('input-error');
            $('#i_cguard').removeClass('fa-exclamation-circle');
        }
        else {
            errorcguard = true;
            $('#cguard').addClass('input-error');
            $('#i_cguard').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#cguardNum').keyup(function(){
        if( $('#cguardNum').val().length !== '' ){
            errorcguardNum = false;
            $('#cguardNum').removeClass('input-error');
            $('#i_cguardNum').removeClass('fa-exclamation-circle');
        }
        else {
            errorcguardNum = true;
            $('#cguardNum').addClass('input-error');
            $('#i_cguardNum').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    
    $("#editContactInfo").submit(function(event){
        event.preventDefault();

        if(erroradd == false &&
            errorcNom == false &&
            errorcguard == false &&
            errorcguardNum == false &&
            erroremail == false ){
            $.ajax({
                url: "assets/updateInfo.php",
                type: 'POST',
                data: $('#editContactInfo').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    window.location='../Client Edit Contact Information/';
                }
            });
        } else{


        }
        

    })



});