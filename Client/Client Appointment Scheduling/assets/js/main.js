$(document).ready(function () {

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'mgs001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Recorded successfully</span>";
        }
        else if($('#msg').val() == 'mgs002'){
            var msg = "<span class='alert_icon red'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>The schedule is already taken</span>";
        }
        $("#alert_contentappointment").html(msg);
        setTimeout(function(){
            $("#alert_bottomappointment").removeClass('alertOpen')
        },5000);
    }

});