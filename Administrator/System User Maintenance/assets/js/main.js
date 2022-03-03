$(document).ready(function(){
    $('#sysSide').addClass('sideActive');

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'msg001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Edit User's Role Successfully</span>";
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

    $("#addUser").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "assets/addUser.php",
            type: 'POST',
            data: $('#addUser').serialize(),
            datatype: "text",
            cache:false,
            success:function(result){
                if(result = "success"){
                    $("#addUser")[0].reset();
                    
                }
                
            }
        });
    })
});


