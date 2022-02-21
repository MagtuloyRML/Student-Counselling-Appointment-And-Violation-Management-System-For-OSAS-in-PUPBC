$(document).ready(function(){
    $('#vEntry').addClass('active_side');
    
    $("#entrysubmit").attr("disabled", true);
    $("#entrysubmit").removeClass('modal_foot_bttn1');
    $("#entrysubmit").addClass('disable');

    studError = true;
    vioaltionError = true;
    sanctionError = true;
    dateError = true;
    
    $('#bttnModalEntry').on('click', function(){
        $('#modal_add_entry').css('display', 'flex');
    });

    $('#close_modal').on('click', function(){
        $("#i_studNum").removeClass('fa-circle-exclamation');
        $("#i_violations").removeClass('fa-circle-exclamation');
        $("#i_sanctions").removeClass('fa-circle-exclamation');

        $("#entrysubmit").attr("disabled", true);
        $("#entrysubmit").removeClass('modal_foot_bttn1');
        $("#entrysubmit").addClass('disable');

        $('#modal_add_entry').css('display', 'none');
        $('#studDetails')[0].reset();
       
    });

    $('#close_modal2').on('click', function(){
        $("#i_studNum").removeClass('fa-circle-exclamation');
        $("#i_violations").removeClass('fa-circle-exclamation');
        $("#i_sanctions").removeClass('fa-circle-exclamation');

        $("#entrysubmit").attr("disabled", true);
        $("#entrysubmit").removeClass('modal_foot_bttn1');
        $("#entrysubmit").addClass('disable');

        $('#modal_add_entry').css('display', 'none');
        $('#studDetails')[0].reset();
        
    });

    $("#studNum").keyup(function(){ 
        if($("#studNum").val() == 0){
            studError = true;
            $("#i_studNum").addClass('fa-circle-exclamation');
        }else{
            studError = false;
            $("#i_studNum").removeClass('fa-circle-exclamation');
        }
        $("#entrysubmit").attr("disabled", false);
        $("#entrysubmit").removeClass('disable');
        $("#entrysubmit").addClass('modal_foot_bttn1');
    });

    $("#violations").change(function(){ 
        if($("#violations").val() == 0){
            vioaltionError = true;
            $("#i_violations").addClass('fa-circle-exclamation');
        }else{
            vioaltionError = false;
            $("#i_violations").removeClass('fa-circle-exclamation');
        }
        $("#entrysubmit").attr("disabled", false);
        $("#entrysubmit").removeClass('disable');
        $("#entrysubmit").addClass('modal_foot_bttn1');
    });

    $("#sanctions").change(function(){ 
        if($("#sanctions").val() == 0){
            sanctionError = true;
            $("#i_sanctions").addClass('fa-circle-exclamation');
        }else{
            sanctionError = false;
            $("#i_sanctions").removeClass('fa-circle-exclamation');
        }
        $("#entrysubmit").attr("disabled", false);
        $("#entrysubmit").removeClass('disable');
        $("#entrysubmit").addClass('modal_foot_bttn1');
    });
    
    $("#date").blur(function(){ 
        if(!Date.parse($("#date").val())){
            dateError = true;
            $("#i_date").addClass('fa-circle-exclamation');
        }else{
            dateError = false;
            $("#i_date").removeClass('fa-circle-exclamation');
        }
        $("#entrysubmit").attr("disabled", false);
        $("#entrysubmit").removeClass('disable');
        $("#entrysubmit").addClass('modal_foot_bttn1');
    });


    $("#studDetails").submit(function(event){
        event.preventDefault();
        if(studError == true){
            $("#i_studNum").addClass('fa-circle-exclamation');
        }

        if(vioaltionError == true){
            $("#i_violations").addClass('fa-circle-exclamation');
        }

        if(sanctionError == true){
            $("#i_sanctions").addClass('fa-circle-exclamation');
        }

        if(dateError == true){
            $("#i_date").addClass('fa-circle-exclamation');
        }

        if(studError == false && vioaltionError == false && sanctionError == false && dateError == false ){
            $.ajax({
                url: "assets/insertViolationEntry.php",
                type: 'POST',
                data: $('#studDetails').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if(result = "success"){
                        $("#studDetails")[0].reset();
                        $("#table_data").append("assets/refresh_table.php");
                        $("#entrysubmit").attr("disabled", true);
                        $("#entrysubmit").removeClass('modal_foot_bttn1');
                        $("#entrysubmit").addClass('disable');
                        $('#modal_add_entry').css('display', 'none');
                       // window.location.href = '../Violation Entry/';
                    }
                     
                }
            });
        }
            
    })

    $("#editsubmit").attr("disabled", true);
    $("#editsubmit").removeClass('modal_foot_bttn1');
    $("#editsubmit").addClass('disable');


    $('.editBttn').on('click', function(){
        var violationEntryID = $(this).attr("id");
        var studNumText = $('.studNum'+violationEntryID).attr("id");
        var violationText = $('.Violations'+violationEntryID).attr("id");
        var sanctionText = $('.Sanctions'+violationEntryID).attr("id");
        var dateText = $('.Date'+violationEntryID).attr("id");

        $('#modal_edit_entry').css('display', 'flex');
        $("#id").val(violationEntryID);
        $("#studNumEdit").val(studNumText);

        $("#violationsEdit option:contains(" + violationText +")").prop("selected", true);

        $("#sanctionsEdit option:contains(" + sanctionText +")").prop("selected", true);

        $("#dateEdit").val(dateText);
    });

    $('#close_modal3').on('click', function(){
        studEditError = false;
        vioaltionEditError = false;
        sanctionEditError = false;
        dateEditError = false;
        $("#i_studNumEdit").removeClass('fa-circle-exclamation');
        $("#i_violationsEdit").removeClass('fa-circle-exclamation');
        $("#i_sanctionsEdit").removeClass('fa-circle-exclamation');
        $("#i_dateEdit").removeClass('fa-circle-exclamation');

        $("#editsubmit").attr("disabled", true);
        $("#editsubmit").removeClass('modal_foot_bttn1');
        $("#editsubmit").addClass('disable');

        $("#editDetails")[0].reset();
        $('#modal_edit_entry').css('display', 'none');
        
        
        
    });

                    
    studEditError = false;
    vioaltionEditError = false;
    sanctionEditError = false;
    dateEditError = false;
                    
    $('#close_modal4').on('click', function(){
        studEditError = false;
        vioaltionEditError = false;
        sanctionEditError = false;
        dateEditError = false;
        $("#i_studNumEdit").removeClass('fa-circle-exclamation');
        $("#i_violationsEdit").removeClass('fa-circle-exclamation');
        $("#i_sanctionsEdit").removeClass('fa-circle-exclamation');
        $("#i_dateEdit").removeClass('fa-circle-exclamation');

        $("#editsubmit").attr("disabled", true);
        $("#editsubmit").removeClass('modal_foot_bttn1');
        $("#editsubmit").addClass('disable');

        $("#editDetails")[0].reset();
        $('#modal_edit_entry').css('display', 'none');
        
    });

    $("#studNumEdit").keyup(function(){ 
        if($("#studNumEdit").val() == 0){
            studEditError = true;
            $("#i_studNumEdit").addClass('fa-circle-exclamation');
        }else{
            studEditError = false;
            $("#i_studNumEdit").removeClass('fa-circle-exclamation');
        }
        $("#editsubmit").attr("disabled", false);
        $("#editsubmit").removeClass('disable');
        $("#editsubmit").addClass('modal_foot_bttn1');
    });

    $("#violationsEdit").change(function(){ 
        if($("#violationsEdit").val() == 0){
            vioaltionEditError = true;
            $("#i_violationsEdit").addClass('fa-circle-exclamation');
        }else{
            vioaltionEditError = false;
            $("#i_violationsEdit").removeClass('fa-circle-exclamation');
        }
        $("#editsubmit").attr("disabled", false);
        $("#editsubmit").removeClass('disable');
        $("#editsubmit").addClass('modal_foot_bttn1');
    });

    $("#sanctionsEdit").change(function(){ 
        if($("#sanctionsEdit").val() == 0){
            sanctionEditError = true;
            $("#i_sanctionsEdit").addClass('fa-circle-exclamation');
        }else{
            sanctionEditError = false;
            $("#i_sanctionsEdit").removeClass('fa-circle-exclamation');
        }
        $("#editsubmit").attr("disabled", false);
        $("#editsubmit").removeClass('disable');
        $("#editsubmit").addClass('modal_foot_bttn1');
    });
                    
    $("#dateEdit").blur(function(){ 
        if(!Date.parse($("#dateEdit").val())){
            dateEditError = true;
            $("#i_dateEdit").addClass('fa-circle-exclamation');
        }else{
            dateEditError = false;
            $("#i_dateEdit").removeClass('fa-circle-exclamation');
        }
        $("#editsubmit").attr("disabled", false);
        $("#editsubmit").removeClass('disable');
        $("#editsubmit").addClass('modal_foot_bttn1');
    });


    $("#editDetails").submit(function(event){
        event.preventDefault();
        if(studEditError == true){
            $("#i_studNumEdit").addClass('fa-circle-exclamation');
        }

        if(vioaltionEditError == true){
            $("#i_violationsEdit").addClass('fa-circle-exclamation');
        }

        if(sanctionEditError == true){
            $("#i_sanctionsEdit").addClass('fa-circle-exclamation');
        }

        if(dateEditError == true){
            $("#i_dateEdit").addClass('fa-circle-exclamation');
        }

        if(studEditError == false && vioaltionEditError == false && sanctionEditError == false && dateEditError == false ){
            $.ajax({
                url: "assets/editViolationEntry.php",
                type: 'POST',
                data: $('#editDetails').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if(result = "success"){
                        $("#editDetails")[0].reset();
                        $("#table_data").append("assets/refresh_table.php");
                        $("#editsubmit").attr("disabled", true);
                        $("#editsubmit").removeClass('modal_foot_bttn1');
                        $("#editsubmit").addClass('disable');
                        $('#modal_edit_entry').css('display', 'none');
                      //  window.location.href = '../Violation Entry/';
                    }
                     
                }
            });
        }
            
    })



    


});