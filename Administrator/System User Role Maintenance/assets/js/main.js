$(document).ready(function(){

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
                    if(result = "success"){
                        $("#addRole")[0].reset();
                        $("#tableRoles").load("assets/updateRoleTable.php");
                    }
                }
            });
        }
        
    })
    $("#updateRoles").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "assets/addUser.php",
            type: 'POST',
            data: $('#updateRoles').serialize(),
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


