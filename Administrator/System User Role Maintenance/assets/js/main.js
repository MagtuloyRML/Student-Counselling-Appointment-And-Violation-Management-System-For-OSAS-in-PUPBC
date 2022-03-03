$(document).ready(function(){
    $('#sysSide').addClass('sideActive');

    $("#alert_Close_bottappointment").click(function () { 
        $("#alert_bottomappointment").removeClass('alertOpen');
    });
    
    if($('#msg').val()){
        $("#alert_bottomappointment").addClass('alertOpen');
        if($('#msg').val() == 'msg001'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Edit User Role Successfully</span>";
        }
        else if($('#msg').val() == 'msg002'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Select xlxs file only</span>";
        }
        else if($('#msg').val() == 'msg003'){
            var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Please select a file</span>";
        }
        else if($('#msg').val() == 'msg004'){
            var msg = "<span class='alert_icon green'><i class='fa-solid fa-check'></i></span><span class='alert_text'>Add User Role Successfully</span>";
        }
        else if($('#msg').val() == 'msg005'){
            var msg = "<span class='alert_icon red'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Add User Role Unsuccessfully</span>";
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

    $("#submitRole").attr("disabled", true);
    $("#submitRole").removeClass('bttn');
    $("#submitRole").addClass('disable');

    roleNameCheckError = true;
    studCouncheckError = true;
    studViolationcheckError = true;
    sysMainsCheckError = true;

    $("#roleNameCheck").keyup(function(){ 
        if($("#roleNameCheck").val() == 0){
            roleNameCheckError = true;
            $("#i_roleName").addClass('fa-circle-exclamation');
        }else{
            roleNameCheckError = false;
            $("#i_roleName").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#studCouncheck").change(function(){ 
        if($("#studCouncheck").val() == 0){
            studCouncheckError = true;
            $("#i_studCouncheck").addClass('fa-circle-exclamation');
        }else{
            studCouncheckError = false;
            $("#i_studCouncheck").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#studViolationcheck").change(function(){ 
        if($("#studViolationcheck").val() == 0){
            studViolationcheckError = true;
            $("#i_studViolationcheck").addClass('fa-circle-exclamation');
        }else{
            studViolationcheckError = false;
            $("#i_studViolationcheck").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#sysMainsCheck").change(function(){ 
        if($("#sysMainsCheck").val() == 0){
            sysMainsCheckError = true;
            $("#i_sysMainsCheck").addClass('fa-circle-exclamation');
        }else{
            sysMainsCheckError = false;
            $("#i_sysMainsCheck").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#addRole").submit(function(event){
        event.preventDefault();
        if(roleNameCheckError == true){
            $("#i_roleName").addClass('fa-circle-exclamation');
        }
        if(studCouncheckError == true){
            $("#i_studCouncheck").addClass('fa-circle-exclamation');
        }
        if(studViolationcheckError == true){
            $("#i_studViolationcheck").addClass('fa-circle-exclamation');
        }
        if(sysMainsCheckError == true){
            $("#i_sysMainsCheck").addClass('fa-circle-exclamation');
        }
        if(roleNameCheckError == false &&
            studCouncheckError == false &&
            studViolationcheckError == false &&
            sysMainsCheckError == false){
            $.ajax({
                url: "assets/addRole.php",
                type: 'POST',
                data: $('#addRole').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if($.trim(result) == "msg005"){
                        var msg = "<span class='alert_icon orange'><i class='fa-solid fa-exclamation'></i></span><span class='alert_text'>Edit Role Unsuccessfully</span>";
                        $("#alert_bottom").addClass('alertOpen');
                        $("#alert_content").html(msg);
                        setTimeout(function(){
                            $("#alert_bottom").removeClass('alertOpen')
                        },5000);
                    }else{
                        window.location.href = '../System User Role Maintenance/?msg='+result;
                    }
                }
            });
        }
        
    })
    
});


