$(document).ready(function(){

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport:{
            width: 200,
            height: 200, 
            type: 'square'
        },
        boundary:{
            width:300,
            hiegth:300
        }
    });
    
    $('#pic_filename').on('change', function(){
        //var file = this.files[0];
        //var fileType = file["type"];
        //var validImageTypes = ["image/*"];
        //if ($.inArray(fileType, validImageTypes) < 0) {
            // invalid file type code goes here.
        //}
        var reader = new FileReader();
        reader.onload = function (event){
            $image_crop.croppie('bind', {
                url: event.target.result
            })
        }
        reader.readAsDataURL(this.files[0]);
        $('#modal_edit_pic').css('display', 'flex');
    });

    $('#cropNUpload').on('click', function(event){
        event.preventDefault();
        $image_crop.croppie('result',{
            type: 'canvas',
            size: 'size'
        }).then(function(response){
            $.ajax({
                url: "assets/upload_picture.php",
                type: "POST", 
                data: {"image": response},
                success:function(data){
                    if(data = "Success"){
                        $("#prof_pic_div").load("assets/displayUpdatedPic.php");
                        $("#profile_bttn").load("assets/displayUpdatedPic.php");
                        $('#modal_edit_pic').css('display', 'none');
                        $('#pic_filename').val(null);
                    }
                }
            });
        })
    });


    $('#close_modal').on('click', function(){
        $('#modal_edit_pic').css('display', 'none');
        $('#pic_filename').val(null);
    });

    $('#close_modal2').on('click', function(){
        $('#modal_edit_pic').css('display', 'none');
        $('#pic_filename').val(null);
    });

    
    errorfst_name = false;
    errormid_name = false;
    errorlast_name = false;
    errorsuff_name = false;
    erroradmin_contact = false;
    erroradmin_email = false;
    erroradd = false;


    $('#saveInfo').attr('disabled', 'disabled');
    $('#saveInfo').addClass('disable');

    
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

    $('#suffname').keyup(function(){
        var regexp = /^[a-zA-Z ]+$/;
        if(regexp.test($('#suffname').val())) {
            errorsuff_name = false;
            $('#input_suffname').removeClass('input-error');
            $('#i_suffname').removeClass('fa-exclamation-circle');
        } else if($('#suffname').val() == 0){
            errorsuff_name = false;
            $('#input_suffname').removeClass('input-error');
            $('#i_suffname').removeClass('fa-exclamation-circle');
        } else {
            errorsuff_name = true;
            $('#input_suffname').addClass('input-error');
            $('#i_suffname').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#aNo').keyup(function(){
        var regexp = /^[0-9]{11}$/;
        if(regexp.test($('#aNo').val())) {
            erroradmin_contact = false;
            $('#input_aNo').removeClass('input-error');
            $('#i_aNo').removeClass('fas fa-exclamation-circle');
        } else {
            erroradmin_contact = true;
            $('#input_aNo').addClass('input-error');
            $('#i_aNo').addClass('fas fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#aAdd').keyup(function(){
        if(!($('#aAdd').val().length == 0)){
            erroradd = false;
            $('#input_aAdd').removeClass('input-error');
            $('#i_aAdd').removeClass('fa-exclamation-circle');
        }
         else {
            erroradd = true;
            $('#input_aAdd').addClass('input-error');
            $('#i_aAdd').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })

    $('#aEmail').keyup(function(){
        var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
        if(regexp.test($('#aEmail').val())) {
            erroradmin_email = false;
            $('#input_aEmail').removeClass('input-error');
            $('#i_aEmail').removeClass('fa-exclamation-circle');
        }else if($('#aEmail').val().length == 0){
            erroradmin_email = true;
            $('#input_aEmail').addClass('input-error');
            $('#i_aEmail').addClass('fa-exclamation-circle');
        }
         else {
            erroradmin_email = true;
            $('#input_aEmail').addClass('input-error');
            $('#i_aEmail').addClass('fa-exclamation-circle');
        }
        $('#saveInfo').removeAttr('disabled');
        $('#saveInfo').removeClass('disable');
    })
    
    $("#editInfo").submit(function(event){
        event.preventDefault();
        if(errorfst_name == false && errormid_name == false && errorlast_name == false && errorsuff_name == false
            && erroradmin_contact == false && erroradmin_email == false && erroradd == false ){
            $.ajax({
                url: "assets/updateInfo.php",
                type: 'POST',
                data: $('#editInfo').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){

                    window.location='../Administrator Edit Personal Info/';
                }
            });
        } else{
        }
    })

});