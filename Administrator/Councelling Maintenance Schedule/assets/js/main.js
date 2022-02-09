$(document).ready(function(){

    $("#evaulAvailSched").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "assets/insertAvail_sched.php",
            type: 'POST',
            data: $('#evaulAvailSched').serialize(),
            datatype: "text",
            cache:false,
            success:function(result){
                if(result = "success"){
                    $("#evaulAvailSched")[0].reset();
                    window.location='../Councelling Maintenance Schedule/';
                }
                
            }
        });
    })
});


