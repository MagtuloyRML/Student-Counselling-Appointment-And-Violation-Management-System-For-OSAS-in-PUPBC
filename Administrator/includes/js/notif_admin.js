function notifNum() {
    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("notifCount").innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "../includes/notif_data.php", true);
    xhttp.send();
    },1000);
}
notifNum();

function notifText() {
    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("notif_content").innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "../includes/notif_text.php", true);
    xhttp.send();
    },1000);
}

notifText();

$(window).on('load',function(){
    $(".loader").fadeOut(2000);
    $(".content").fadeIn(1000);
});


$(document).ready(function () {
    $('#notif_bell').click(function (e) { 
        e.preventDefault();
        $.ajax({
            url: "../includes/notif_read.php",
            success: function () {
            }
        });
        
    });

    $("#open_side").click(function () { 
        $("#sideBar_mobile").addClass('openSide');
        $("#blur").addClass('blur');
        
    });

    $("#close_side").click(function () { 
        $("#sideBar_mobile").removeClass('openSide');
        $("#blur").removeClass('blur');
        
    });

    $("#blur").click(function () { 
        $("#sideBar_mobile").removeClass('openSide');
        $("#blur").removeClass('blur');
    });

    if($('#blur').css('display') == 'none')
    {   
        $("#sideBar_mobile").removeClass('openSide');
        $("#blur").removeClass('blur');
    }
    
    $("#alert_Close_bott").click(function () { 
        $("#alert_bottom").removeClass('alertOpen');
        
    });
});