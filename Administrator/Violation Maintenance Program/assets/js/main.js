$(document).ready(function(){
    $('#vSide').addClass('sideActive');

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'msg001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Data Upload Successfully</span>";
        }
        else if($('#msg').val() == 'msg002'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Select xlxs file only</span>";
        }
        else if($('#msg').val() == 'msg003'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Please select a file</span>";
        }
        else if($('#msg').val() == 'msg004'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Edit Data Successfully</span>";
        }
        else if($('#msg').val() == 'msg005'){
            var msg = "<span class='alert_icon red'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Edit Data Unsuccessfully</span>";
        }
        else if($('#msg').val() == 'msg006'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Insert Data Successfully</span>";
        }
        else if($('#msg').val() == 'msg007'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Insert Data Unsuccessfully</span>";
        }
        $("#alert_contentappointment").html(msg);
        setTimeout(function(){
            $("#alert_bottomappointment").removeClass('alertOpen')
        },5000);
    }
    
    $("#addSubmit").attr("disabled", true);
    $("#addSubmit").removeClass('modal_foot_bttn1');
    $("#addSubmit").addClass('disable');

    programerror = true;
    despcriptoinerror = true;
    
    $('#openModal_add_curriculum').on('click', function(){
        $('#modal_curri_input').css('display', 'flex');
    });

    $('#close_modal').on('click', function(){
        programerror = true;
        despcriptoinerror = true;
        $("#i_pcAdd").removeClass('fa-circle-exclamation');
        $("#i_pdAdd").removeClass('fa-circle-exclamation');

        $("#addSubmit").attr("disabled", true);
        $("#addSubmit").removeClass('modal_foot_bttn1');
        $("#addSubmit").addClass('disable');

        $('#modal_curri_input').css('display', 'none');
        $('#pcodeInput')[0].reset();
       
    });

    $('#close_modal2').on('click', function(){
        programerror = true;
        despcriptoinerror = true;
        $("#i_pcAdd").removeClass('fa-circle-exclamation');
        $("#i_pdAdd").removeClass('fa-circle-exclamation');

        $("#addSubmit").attr("disabled", true);
        $("#addSubmit").removeClass('modal_foot_bttn1');
        $("#addSubmit").addClass('disable');

        $('#modal_curri_input').css('display', 'none');
        $('#pcodeInput')[0].reset();
        
    });

    $("#progCode").keyup(function(){ 
        if($("#progCode").val() == 0){
            programerror = true;
            $("#i_pcAdd").addClass('fa-circle-exclamation');
        }else{
            programerror = false;
            $("#i_pcAdd").removeClass('fa-circle-exclamation');
        }
        if( programerror == false && despcriptoinerror == false){
            $("#addSubmit").attr("disabled", false);
            $("#addSubmit").removeClass('disable');
            $("#addSubmit").addClass('modal_foot_bttn1');
        }else{
            $("#addSubmit").attr("disabled", true);
            $("#addSubmit").removeClass('modal_foot_bttn1');
            $("#addSubmit").addClass('disable');
        }
        
    });

    $("#progDescription").keyup(function(){ 
        if($("#progDescription").val() == 0){
            despcriptoinerror = true;
            $("#i_pdAdd").addClass('fa-circle-exclamation');
        }else{
            despcriptoinerror = false;
            $("#i_pdAdd").removeClass('fa-circle-exclamation');
        }
        if( programerror == false && despcriptoinerror == false){
            $("#addSubmit").attr("disabled", false);
            $("#addSubmit").removeClass('disable');
            $("#addSubmit").addClass('modal_foot_bttn1');
        }else{
            $("#addSubmit").attr("disabled", true);
            $("#addSubmit").removeClass('modal_foot_bttn1');
            $("#addSubmit").addClass('disable');
        }
    });

    $("#pcodeInput").submit(function(event){
        event.preventDefault();
        if(programerror == true){
            $("#i_pcAdd").addClass('fa-circle-exclamation');
        }

        if(despcriptoinerror == true){
            $("#i_pdAdd").addClass('fa-circle-exclamation');
        }

        if(programerror == false && despcriptoinerror == false ){
            $.ajax({
                url: "assets/save_display_curriculum.php",
                type: 'POST',
                data: $('#pcodeInput').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    $("#pcodeInput")[0].reset();
                    $("#table_data").append("assets/updatedDisplay_pcode.php");
                    $("#addSubmit").attr("disabled", true);
                    $("#addSubmit").removeClass('modal_foot_bttn1');
                    $("#addSubmit").addClass('disable');
                    $('#modal_curri_input').css('display', 'none');
                    window.location.href = '../Violation Maintenance Program/?msg='+result;
                    
                     
                }
            });
        }
            
    })
    

    $("#editsubmit").attr("disabled", true);
    $("#editsubmit").removeClass('modal_foot_bttn1');
    $("#editsubmit").addClass('disable');

    programTexterror = false;
    despcriptoinTexterror = false;

    $('.editBttn').on('click', function(){
        var programID = $(this).attr("id");
        var programText = $('.pCode'+programID).attr("id");
        var despcriptoinText = $('.pDescription'+programID).attr("id");
        $('#modal_curri_edit').css('display', 'flex');
        $("#pCode").val(programID);
        $("#pc").val(programText);
        $("#pd").val(despcriptoinText);
    });

    $('#close_modal4').on('click', function(){
        programTexterror = false;
        despcriptoinTexterror = false;

        $("#i_pc").removeClass('fa-circle-exclamation');
        $("#i_pd").removeClass('fa-circle-exclamation');

        $("#editsubmit").attr("disabled", true);
        $("#editsubmit").removeClass('modal_foot_bttn1');
        $("#editsubmit").addClass('disable');

        $("#editSave")[0].reset();
        $('#modal_curri_edit').css('display', 'none');
        
        
    });
                    
    $('#close_modal5').on('click', function(){
        programTexterror = false;
        despcriptoinTexterror = false;
        $("#i_pc").removeClass('fa-circle-exclamation');
        $("#i_pd").removeClass('fa-circle-exclamation');

        $("#editsubmit").attr("disabled", true);
        $("#editsubmit").removeClass('modal_foot_bttn1');
        $("#editsubmit").addClass('disable');

        $("#editSave")[0].reset();
        $('#modal_curri_edit').css('display', 'none');
        
    });

    $("#pc").keyup(function(){ 
        if($("#pc").val() == 0){
            programTexterror = true;
            $("#i_pc").addClass('fa-circle-exclamation');
        }else{
            programTexterror = false;
            $("#i_pc").removeClass('fa-circle-exclamation');
        }
        if(programTexterror == false && despcriptoinTexterror == false){
            $("#editsubmit").attr("disabled", false);
            $("#editsubmit").removeClass('disable');
            $("#editsubmit").addClass('modal_foot_bttn1');
        }else{
            $("#editsubmit").attr("disabled", true);
            $("#editsubmit").removeClass('modal_foot_bttn1');
            $("#editsubmit").addClass('disable');
        }
        
    });
                    
    $("#pd").keyup(function(){ 
        if($("#pd").val() == 0){
            despcriptoinTexterror = true;
            $("#i_pd").addClass('fa-circle-exclamation');
        }else{
            despcriptoinTexterror = false;
            $("#i_pd").removeClass('fa-circle-exclamation');
        }
        if(programTexterror == false && despcriptoinTexterror == false){
            $("#editsubmit").attr("disabled", false);
            $("#editsubmit").removeClass('disable');
            $("#editsubmit").addClass('modal_foot_bttn1');
        }else{
            $("#editsubmit").attr("disabled", true);
            $("#editsubmit").removeClass('modal_foot_bttn1');
            $("#editsubmit").addClass('disable');
        }
    });


    $("#editSave").submit(function(event){
        event.preventDefault();
        if(programTexterror == true){
            $("#i_pc").addClass('fa-circle-exclamation');
        }

        if(despcriptoinTexterror == true){
            $("#i_pd").addClass('fa-circle-exclamation');
        }

        if(programTexterror == false && despcriptoinTexterror == false  ){
            $.ajax({
                url: "assets/update.php",
                type: 'POST',
                data: $('#editSave').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                        $("#editSave")[0].reset();
                        $("#table_data").append("assets/updatedDisplay_pcode.php");
                        $("#editsubmit").attr("disabled", true);
                        $("#editsubmit").removeClass('modal_foot_bttn1');
                        $("#editsubmit").addClass('disable');
                        $('#modal_curri_edit').css('display', 'none');
                        window.location.href = '../Violation Maintenance Program/?msg='+result;
                     
                }
            });
        }
            
    })

});