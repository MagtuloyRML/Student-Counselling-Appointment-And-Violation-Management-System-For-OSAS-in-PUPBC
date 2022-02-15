$(document).ready(function(){
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
        $("#i_date").removeClass('fa-circle-exclamation');

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
        $("#i_date").removeClass('fa-circle-exclamation');

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
                        $("#table_data").load('assets/refresh_table.php');
                        $("#entrysubmit").attr("disabled", true);
                        $("#entrysubmit").removeClass('modal_foot_bttn1');
                        $("#entrysubmit").addClass('disable');
                        $('#modal_add_entry').css('display', 'none');
                    }
                     
                }
            });
        }
            
    })

});