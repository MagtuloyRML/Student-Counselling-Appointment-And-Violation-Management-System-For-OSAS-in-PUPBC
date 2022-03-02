$(document).ready(function () {
    errorReasonInput = true;
    $("#openCancelMSG").attr("disabled", true);
    $("#openCancelMSG").removeClass('bttn');
    $("#openCancelMSG").addClass('disable');

    $('#openCancelMSG').on('click', function(){
        $('#modal_cancelMSG').css('display', 'flex');
    });

    $('#close_modal').on('click', function(){
        $('#modal_cancelMSG').css('display', 'none');
        
    });

    $('#close_modal2').on('click', function(){
        $('#modal_cancelMSG').css('display', 'none');
        
    });

    
    $('#reason').keyup(function(){
        if($('#reason').val().length > 0){
            errorReasonInput = false;
            $("#i_reason").removeClass('fa-circle-exclamation');
            $("#openCancelMSG").attr("disabled", false);
            $("#openCancelMSG").removeClass('disable');
            $("#openCancelMSG").addClass('bttn');
        } else {
            errorReasonInput = true;
            $("#i_reason").addClass('fa-circle-exclamation');
            $("#openCancelMSG").attr("disabled", true);
            $("#openCancelMSG").removeClass('bttn');
            $("#openCancelMSG").addClass('disable');
        }
    })

    $("#cancelAppoint").submit(function(event){
        event.preventDefault();
        if(errorReasonInput == false ){
            $.ajax({
                url: "assets/cancel_sched_work.php",
                type: 'POST',
                data: $('#cancelAppoint').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    $("#alert_bottom").addClass('alertOpen');
                    $("#alert_content").html(result);
                    setTimeout(function(){
                        $("#alert_bottom").removeClass('alertOpen')
                    },5000);
                    setTimeout(function(){
                        window.location.href = "../Client Manage Appointment/";
                    },5200);

                }
            });
        } else{


        }
        

    })



});