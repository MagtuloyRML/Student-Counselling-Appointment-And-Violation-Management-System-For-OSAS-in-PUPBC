$(document).ready(function(){
    
    if($("#studCounceData").prop('checked') == true){
        $("#studCounceData").prop('checked', true);
        $("#i_studCounceData").removeClass('fa-regular fa-square')
        $("#i_studCounceData").addClass('fa-solid fa-square-check'); 
    }
    else if($("#studCounceData").prop('checked') == false){
        $("#studCounceData").prop('checked', false);
        $("#i_studCounceData").removeClass('fa-solid fa-square-check');
        $("#i_studCounceData").addClass('fa-regular fa-square');
    }
    if($("#studViolationData").prop('checked') == true){
        $("#studViolationData").prop('checked', true);
        $("#i_studViolationData").removeClass('fa-regular fa-square')
        $("#i_studViolationData").addClass('fa-solid fa-square-check'); 
    }
    else if($("#studViolationData").prop('checked') == false){
        $("#studViolationData").prop('checked', false);
        $("#i_studViolationData").removeClass('fa-solid fa-square-check');
        $("#i_studViolationData").addClass('fa-regular fa-square');
    }
    
    $('#label_studCounceData').click(function () { 
        if($("#studCounceData").prop('checked') == true){
            $("#studCounceData").prop('checked', true);
            $("#i_studCounceData").removeClass('fa-regular fa-square')
            $("#i_studCounceData").addClass('fa-solid fa-square-check'); 
        }
        else if($("#studCounceData").prop('checked') == false){
            $("#studCounceData").prop('checked', false);
            $("#i_studCounceData").removeClass('fa-solid fa-square-check');
            $("#i_studCounceData").addClass('fa-regular fa-square');
        }
    });
    
    $('#label_studViolationData').click(function () { 
        if($("#studViolationData").prop('checked') == true){
            $("#studViolationData").prop('checked', true);
            $("#i_studViolationData").removeClass('fa-regular fa-square')
            $("#i_studViolationData").addClass('fa-solid fa-square-check'); 
        }
        else if($("#studViolationData").prop('checked') == false){
            $("#studViolationData").prop('checked', false);
            $("#i_studViolationData").removeClass('fa-solid fa-square-check');
            $("#i_studViolationData").addClass('fa-regular fa-square');
        }
    });




    $("#addRole").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "assets/addUser.php",
            type: 'POST',
            data: $('#addRole').serialize(),
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


