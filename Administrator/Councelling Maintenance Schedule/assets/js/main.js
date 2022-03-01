$(document).ready(function(){
    $('#cSide').addClass('sideActive');

    $("#evaulAvailSched").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "assets/insertAvail_sched.php",
            type: 'POST',
            data: $('#evaulAvailSched').serialize(),
            datatype: "text",
            cache:false,
            success:function(result){
                $("#alert_bottom").addClass('alertOpen');
                $("#alert_content").html(result);
                setTimeout(function(){
                    $("#alert_bottom").removeClass('alertOpen');
                },5000);
                
            }
        });
    })
});


