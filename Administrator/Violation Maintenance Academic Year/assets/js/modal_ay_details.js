document.getElementById('openModal_input_ay_details').addEventListener('click', function() {
    document.querySelector('#modal_ay_input').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_ay_input').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_ay_input').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_ay_input')) {
        document.querySelector('#modal_ay_input').style.display = "none";
    }
  };

$(document).ready(function () {
    $('#vSide').addClass('sideActive');

    $("#submit").attr("disabled", "disabled");
    $("#submit").removeClass('modal_foot_bttn1');
    $("#submit").addClass('disable');

    yearFromError = true;
    yearToError = true;
    semesterError = true;

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });

    $("#yearFrom").keyup(function(){ 
        if( !parseInt(Number($("#yearFrom").val())) ){
            yearFromError = true;
            $("#i_yearFrom").addClass('fa-circle-exclamation');
        }
        else if($("#yearFrom").val() == 0){
            yearFromError = true;
            $("#i_yearFrom").addClass('fa-circle-exclamation');
        }else{
            yearFromError = false;
            $("#i_yearFrom").removeClass('fa-circle-exclamation');
        }
        if(yearFromError == false && yearToError == false && semesterError == false){
            $("#submit").attr("disabled", false);
            $("#submit").removeClass('disable');
            $("#submit").addClass('modal_foot_bttn1');
        }
        else{
            $("#submit").attr("disabled", "disabled");
            $("#submit").removeClass('modal_foot_bttn1');
            $("#submit").addClass('disable');
        }
        
    });

    $("#yearTo").keyup(function(){ 
        if( !parseInt(Number($("#yearTo").val())) ){
            yearToError = true;
            $("#i_yearTo").addClass('fa-circle-exclamation');
        }
        else if($("#yearTo").val() == 0){
            yearToError = true;
            $("#i_yearTo").addClass('fa-circle-exclamation');
        }else{
            yearToError = false;
            $("#i_yearTo").removeClass('fa-circle-exclamation');
        }
        if(yearFromError == false && yearToError == false && semesterError == false){
            $("#submit").attr("disabled", false);
            $("#submit").removeClass('disable');
            $("#submit").addClass('modal_foot_bttn1');
        }
        else{
            $("#submit").attr("disabled", "disabled");
            $("#submit").removeClass('modal_foot_bttn1');
            $("#submit").addClass('disable');
        }
    });

    $("#semester").keyup(function(){ 
        if($("#semester").val() == 0){
            semesterError = true;
            $("#i_semester").addClass('fa-circle-exclamation');
        }else{
            semesterError = false;
            $("#i_semester").removeClass('fa-circle-exclamation');
        }
        if(yearFromError == false && yearToError == false && semesterError == false){
            $("#submit").attr("disabled", false);
            $("#submit").removeClass('disable');
            $("#submit").addClass('modal_foot_bttn1');
        }
        else{
            $("#submit").attr("disabled", "disabled");
            $("#submit").removeClass('modal_foot_bttn1');
            $("#submit").addClass('disable');
        }
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'mgs001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Insert Data Successfully</span>";
        }
        else if($('#msg').val() == 'mgs002'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Something Error in Inserting Data</span>";
        }
        $("#alert_contentappointment").html(msg);
        setTimeout(function(){
            $("#alert_bottomappointment").removeClass('alertOpen')
        },5000);
    }
});