$(document).ready(function(){
    
    $("#submitRole").attr("disabled", true);
    $("#submitRole").removeClass('bttn');
    $("#submitRole").addClass('disable');

    roleNameCheckError = false;
    roleCouncheck = false;
    statusCheckError = false;

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

    $("#roleCouncheck").change(function(){ 
        if($("#roleCouncheck").val() == 0){
            roleCouncheck = true;
            $("#i_roleCouncheck").addClass('fa-circle-exclamation');
        }else{
            roleCouncheck = false;
            $("#i_roleCouncheck").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#status").change(function(){ 
        if($("#status").val() == 0){
            statusCheckError = true;
            $("#i_status").addClass('fa-circle-exclamation');
        }else{
            statusCheckError = false;
            $("#i_status").removeClass('fa-circle-exclamation');
        }
        $("#submitRole").attr("disabled", false);
        $("#submitRole").removeClass('disable');
        $("#submitRole").addClass('bttn');
    });

    $("#edituserRole").submit(function(event){
        event.preventDefault();
        if(roleNameCheckError == true){
            $("#i_roleName").addClass('fa-circle-exclamation');
        }
        if(roleCouncheck == true){
            $("#i_roleCouncheck").addClass('fa-circle-exclamation');
        }
        if(statusCheckError == true){
            $("#i_status").addClass('fa-circle-exclamation');
        }
        if(roleNameCheckError == false &&
            roleCouncheck == false &&
            statusCheckError == false ){
            $.ajax({
                url: "assets/addRole.php",
                type: 'POST',
                data: $('#edituserRole').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if($.trim(result) == "success"){
                        window.location.href = '../System User Maintenance/';
                    }
                }
            });
        }
        
    })

    
});


