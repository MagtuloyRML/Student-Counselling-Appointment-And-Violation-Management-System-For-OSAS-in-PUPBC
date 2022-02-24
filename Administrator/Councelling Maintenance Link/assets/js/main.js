$(document).ready(function(){

    $("#submit").attr("disabled", true);
    $("#submit").removeClass('bttn');
    $("#submit").addClass('disable');

    zlinkError = false;

    $("#zlink").keyup(function(){ 
        if($("#zlink").val() == 0){
            zlinkError = true;
            $("#i_zlink").addClass('fa-circle-exclamation');
        }else{
            zlinkError = false;
            $("#i_zlink").removeClass('fa-circle-exclamation');
        }
        $("#submit").attr("disabled", false);
        $("#submit").removeClass('disable');
        $("#submit").addClass('bttn');
    });

    $("#zlinkForm").submit(function(event){
        event.preventDefault();
        if(zlinkError == true){
            $("#i_zlink").addClass('fa-circle-exclamation');
        }
        if(zlinkError == false){
            $.ajax({
                url: "assets/insertLink.php",
                type: 'POST',
                data: $('#zlinkForm').serialize(),
                datatype: "text",
                cache:false,
                success:function(result){
                    if($.trim(result) == "success"){
                        $("#zlinkForm")[0].reset();
                        window.location='../Councelling Maintenance Link/';
                    }
                    
                }
            });
        }
        
    })
});


