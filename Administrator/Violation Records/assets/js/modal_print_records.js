document.getElementById('print_record_btn').addEventListener('click', function() {
    document.querySelector('#modal_print_records').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_print_records').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_print_records').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_print_records')) {
        document.querySelector('#modal_print_records').style.display = "none";
    }
  };

$(document).ready(function () {
    $('#vRec').addClass('active_side');
    $('#sidevRec').addClass('sideActive');
});
