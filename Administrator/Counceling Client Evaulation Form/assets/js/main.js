$(document).ready(function(){
    $('#cClient').addClass('active_side');
    $('#sidecClient').addClass('sideActive');

    $("#submit").attr("disabled", true);
    $("#submit").removeClass('bttn');
    $("#submit").addClass('disable');

    evaluationError = true;
    recomError = true;
    

    $('#evaluation').keyup(function(){
        if($('#evaluation').val().length > 0){
            evaluationError = false;
            $("#i_evaluation").removeClass('fa-circle-exclamation');
        } else {
            evaluationError = true;
            $("#i_evaluation").addClass('fa-circle-exclamation');
        }

        if(evaluationError == false && recomError == false){
            $("#submit").attr("disabled", false);
            $("#submit").removeClass('disable');
            $("#submit").addClass('bttn');
        }
        else{
            $("#submit").attr("disabled", true);
            $("#submit").removeClass('bttn');
            $("#submit").addClass('disable');
        }
    })

    $('#recommendation').keyup(function(){
        if($('#recommendation').val().length > 0){
            recomError = false;
            $("#i_recommendation").removeClass('fa-circle-exclamation');
        } else {
            recomError = true;
            $("#i_recommendation").addClass('fa-circle-exclamation');
        }
        if(evaluationError == false && recomError == false){
            $("#submit").attr("disabled", false);
            $("#submit").removeClass('disable');
            $("#submit").addClass('bttn');
        }
        else{
            $("#submit").attr("disabled", true);
            $("#submit").removeClass('bttn');
            $("#submit").addClass('disable');
        }
        
    })

    
    $("#evalEntry").submit(function(){
        
        if(evaluationError == true){
            $("#i_evaluation").addClass('fa-circle-exclamation');
        }

        if(recomError == true){
            $("#i_recommendation").addClass('fa-circle-exclamation');
        }

        if(evaluationError == false && recomError == false ){
                $.ajax({
                    url: "assets/insert_eval.php",
                    type: 'POST',
                    data: $('#evalEntry').serialize(),
                    datatype: "text",
                    cache:false,
                    success:function(){
                        
                        
                    }
                });
        }
            
    })
});


