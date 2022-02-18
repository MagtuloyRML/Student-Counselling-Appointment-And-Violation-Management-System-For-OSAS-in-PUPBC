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
