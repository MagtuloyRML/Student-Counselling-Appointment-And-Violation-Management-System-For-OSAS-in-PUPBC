$(document).ready(function () {
    $('#vSide').addClass('sideActive');

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'msg001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Delete Violation Successfully</span>";
        }
        else if($('#msg').val() == 'msg002'){
            var msg = "<span class='alert_icon red'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Violation is not Exists</span>";
        }
        else if($('#msg').val() == 'msg003'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Please Fill up the Form</span>";
        }
        else if($('#msg').val() == 'msg004'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Delete Sanction Successfully</span>";
        }
        else if($('#msg').val() == 'msg005'){
            var msg = "<span class='alert_icon red'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Sanction is not Unsuccessfully</span>";
        }
        else if($('#msg').val() == 'msg006'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Please Fill up the Form</span>";
        }
        else if($('#msg').val() == 'msg007'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Sanction Can't Able to Delete</span>";
        }
        else if($('#msg').val() == 'msg008'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Violation Can't Able to Delete</span>";
        }
        $("#alert_contentappointment").html(msg);
        setTimeout(function(){
            $("#alert_bottomappointment").removeClass('alertOpen')
        },5000);
    }

    violationError = true;
    $("#violationSubmit").attr("disabled", true);
    $("#violationSubmit").removeClass('modal_foot_bttn1');
    $("#violationSubmit").addClass('disable');

    $('#openModal_addviolation').on('click', function(){
        $('#modal_add_viola_input').css('display', 'flex');
    });

    $('#close_modal').on('click', function(){
        violationError = true;
        $("#i_Violations").removeClass('fa-circle-exclamation');

        $("#violationSubmit").attr("disabled", true);
        $("#violationSubmit").removeClass('modal_foot_bttn1');
        $("#violationSubmit").addClass('disable');

        $('#modal_add_viola_input').css('display', 'none');
        $('#saveViolation')[0].reset();
    });

    $('#close_modal2').on('click', function(){
        violationError = true;
        $("#i_Violations").removeClass('fa-circle-exclamation');

        $("#violationSubmit").attr("disabled", true);
        $("#violationSubmit").removeClass('modal_foot_bttn1');
        $("#violationSubmit").addClass('disable');

        $('#modal_add_viola_input').css('display', 'none');
        $('#saveViolation')[0].reset();
        
    });

    $("#violations").keyup(function(){ 
        if($("#violations").val().length == 0){
            violationError = true;
            $("#i_Violations").addClass('fa-circle-exclamation');
        }else{
            violationError = false;
            $("#i_Violations").removeClass('fa-circle-exclamation');
        }
        if(violationError == false){
            $("#violationSubmit").attr("disabled", false);
            $("#violationSubmit").removeClass('disable');
            $("#violationSubmit").addClass('modal_foot_bttn1');
        }
        else{
            $("#violationSubmit").attr("disabled", true);
            $("#violationSubmit").removeClass('modal_foot_bttn1');
            $("#violationSubmit").addClass('disable');
        }
    });

    $("#saveViolation").submit(function(event){
        event.preventDefault();
        if(violationError == true){
            $("#i_Violations").addClass('fa-circle-exclamation');
        }
        if(violationError == false ){
            $.ajax({
                url: "assets/save_violation.php",
                type: 'POST',
                data: $('#saveViolation').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    violationError = true;
                    $("#i_Violations").removeClass('fa-circle-exclamation');
                    $('#modal_add_viola_input').css('display', 'none');
                    $("#alert_bottom").addClass('alertOpen');
                    $("#v_table").load("update_Vtable.php");
                    $("#alert_content").html(result);
                    $("#saveViolation")[0].reset();
                    setTimeout(function(){
                         $("#alert_bottom").removeClass('alertOpen')
                    },5000);
                    setTimeout(function(){
                        window.location.href = '../Violation Maintenance Violation/';
                   },5200);
                }
            });
        } else{
        }
    })
    $('.v_data_bttn').click(function (e) { 
        e.preventDefault();
        var delID = $(this).attr("id");
        $.ajax({
            url: "assets/delete.php",
            type: "POST",
            data: {delID : delID},
            success: function (response) {
                window.location.href = '../Violation Maintenance Violation/?msg='+response;
            }
        });
        
    });


    sanctionsError = true;
    $("#sanctionSubmit").attr("disabled", true);
    $("#sanctionSubmit").removeClass('modal_foot_bttn1');
    $("#sanctionSubmit").addClass('disable');

    $('#openModal_addsanction').on('click', function(){
        $('#modal_add_sanc_input').css('display', 'flex');
    });

    $('#close_modal1').on('click', function(){
        sanctionsError = true;
        $("#i_sanctions").removeClass('fa-circle-exclamation');

        $("#sanctionSubmit").attr("disabled", true);
        $("#sanctionSubmit").removeClass('modal_foot_bttn1');
        $("#sanctionSubmit").addClass('disable');

        $('#modal_add_sanc_input').css('display', 'none');
        $('#saveSanction')[0].reset();
    });

    $('#close_modal3').on('click', function(){
        sanctionsError = true;
        $("#i_sanctions").removeClass('fa-circle-exclamation');

        $("#sanctionSubmit").attr("disabled", true);
        $("#sanctionSubmit").removeClass('modal_foot_bttn1');
        $("#sanctionSubmit").addClass('disable');

        $('#modal_add_sanc_input').css('display', 'none');
        $('#saveSanction')[0].reset();
        
    });

    $("#sanctions").keyup(function(){ 
        if($("#sanctions").val().length == 0){
            sanctionsError = true;
            $("#i_sanctions").addClass('fa-circle-exclamation');
        }else{
            sanctionsError = false;
            $("#i_sanctions").removeClass('fa-circle-exclamation');
        }
        if(sanctionsError == false){
            $("#sanctionSubmit").attr("disabled", false);
            $("#sanctionSubmit").removeClass('disable');
            $("#sanctionSubmit").addClass('modal_foot_bttn1');
        }
        else{
            $("#sanctionSubmit").attr("disabled", true);
            $("#sanctionSubmit").removeClass('modal_foot_bttn1');
            $("#sanctionSubmit").addClass('disable');
        }
    });

    $("#saveSanction").submit(function(event){
        event.preventDefault();
        if(sanctionsError == true){
            $("#i_sanctions").addClass('fa-circle-exclamation');
        }
        if(sanctionsError == false ){
            $.ajax({
                url: "assets/save_sanction.php",
                type: 'POST',
                data: $('#saveSanction').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    sanctionsError = true;
                    $("#i_sanctions").removeClass('fa-circle-exclamation');
                    $('#modal_add_sanc_input').css('display', 'none');
                    $("#alert_bottom").addClass('alertOpen');
                    $("#s_table").load("update_Stable.php");
                    $("#saveSanction")[0].reset();
                    $("#alert_content").html(result);
                    setTimeout(function(){
                         $("#alert_bottom").removeClass('alertOpen')
                    },5000);
                    setTimeout(function(){
                        window.location.href = '../Violation Maintenance Violation/';
                   },5200);
                    
                }
            });
        } else{
        }
    })

    $('.s_data_bttn').click(function (e) { 
        e.preventDefault();
        var delID = $(this).attr("id");
        $.ajax({
            url: "assets/delete_sanc.php",
            type: "POST",
            data: {delID : delID},
            success: function (response) {
                window.location.href = '../Violation Maintenance Violation/?msg='+response;
            }
        });
        
    });

});