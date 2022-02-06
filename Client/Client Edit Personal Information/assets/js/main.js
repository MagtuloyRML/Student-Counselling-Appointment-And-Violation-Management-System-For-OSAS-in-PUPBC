$(document).ready(function(){

    errorfst_name = false;
    errormid_name = false;
    errorlast_name = false;
    errorstud_num = false;
    errorbday = false;
    errorgender = false;

    $('#saveInfo').attr('disabled', 'disabled');
    $('#saveInfo').addClass('disable');

    $('#stud_num').keyup(function(){
        if( $('#stud_num').val().length == '15' ){
            $('#stud_num').removeClass('input-error');
            $('#i_stud_num').removeClass('fa-exclamation-circle');
        }
        else {
            $('#stud_num').addClass('input-error');
            $('#i_stud_num').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    $('#fname').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#fname').val())) {
            errorfst_name = false;
            $('#input_fname').removeClass('input-error');
            $('#i_fname').removeClass('fa-exclamation-circle');
        } else {
            errorfst_name = true;
            $('#input_fname').addClass('input-error');
            $('#i_fname').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    $('#mname').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#mname').val())) {
            errormid_name = false;
            $('#input_mname').removeClass('input-error');
            $('#i_mname').removeClass('fa-exclamation-circle');
        } else if($('#mname').val() == 0){
            errormid_name = false;
            $('#input_mname').removeClass('input-error');
            $('#i_mname').removeClass('fa-exclamation-circle');
        } else {
            errormid_name = true;
            $('#input_mname').addClass('input-error');
            $('#i_mname').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    $('#lname').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#lname').val())) {
            errorlast_name = false;
            $('#input_lname').removeClass('input-error');
            $('#i_lname').removeClass('fa-exclamation-circle');
        } else {
            errorlast_name = true;
            $('#input_lname').addClass('input-error');
            $('#i_lname').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#bday').blur(function(){
        var bdayVal = $('#bday').val();
        if(Date.parse(bdayVal)){
            errorbday = false;
            $('#bday').removeClass('input-error');
            $('#i_bday').removeClass('fas fa-exclamation-circle');
        } else {
            errorbday = true;
            $('#bday').addClass('input-error');
            $('#i_bday').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    $('#gender').change(function(){
        if($('#gender').val() !== ''){
            errorgender = false;
            $('#gender').removeClass('input-error');
            $('#i_gender').removeClass('fas fa-exclamation-circle');
        } else {
            errorgender = true;
            $('#gender').addClass('input-error');
            $('#i_gender').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $("#editInfo").submit(function(event){
        event.preventDefault();

        if(errorfst_name == false && errormid_name == false && errorlast_name == false && errorstud_num == false &&
            errorbday == false && errorbday == false ){
            $.ajax({
                url: "assets/updateInfo.php",
                type: 'POST',
                data: $('#editInfo').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    window.location='../Client Edit Personal Information/';
                }
            });
        } else{


        }
        

    })



});