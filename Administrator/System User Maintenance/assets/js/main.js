$(document).ready(function(){
    $('#sysSide').addClass('sideActive');

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


