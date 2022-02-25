$(document).ready(function(){
    $('#cClient').addClass('active_side');

    $("#submit").attr("disabled", true);
    $("#submit").removeClass('bttn');
    $("#submit").addClass('disable');

    evaluationError = false;
    recomError = false;
    

    $('#evaluation').keyup(function(){
        if($('#evaluation').val().length > 0){
            evaluationError = false;
            $("#i_evaluation").removeClass('fa-circle-exclamation');
        } else {
            evaluationError = true;
            $("#i_evaluation").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    $('#recommendation').keyup(function(){
        if($('#recommendation').val().length > 0){
            recomError = false;
            $("#i_recommendation").removeClass('fa-circle-exclamation');
        } else {
            recomError = true;
            $("#i_recommendation").addClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    })

    
    $("#evalEntry").submit(function(event){
        event.preventDefault();
        if(evaluationError == true){
            $("#i_evaluation").addClass('fa-circle-exclamation');
        }

        if(recomError == true){
            $("#i_recommendation").addClass('fa-circle-exclamation');
        }

        apointmentID = $('#a_id').val();

        if(evaluationError == false && recomError == false ){
                $.ajax({
                    url: "assets/insert_eval.php",
                    type: 'POST',
                    data: $('#evalEntry').serialize(),
                    datatype: "text",
                    cache:false,
                    success:function(result){
                        if($.trim(result) == "success"){
                            $("#evalEntry")[0].reset();
                            window.location.href = '../Counceling Client Review Evaulation/?a_id='+apointmentID;
                        }
                        else if($.trim(result) == "somethingWrong"){
                            $("#i_evaluation").addClass('fa-circle-exclamation');
                            $("#i_recommendation").addClass('fa-circle-exclamation');
                            evaluationError = true;
                            recomError = true;
                            
                        }
                        
                    }
                });
        }
            
    })
});


