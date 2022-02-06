document.getElementById('upload_violation_bttn').addEventListener('click', function() {
    document.querySelector('#modal_upload_violation').style.display = 'flex';
});
document.querySelector('#close_modal0').addEventListener('click', function(){
    document.querySelector('#modal_upload_violation').style.display = 'none';
});

document.querySelector('#close_modal9').addEventListener('click', function(){
    document.querySelector('#modal_upload_violation').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_upload_violation')) {
        document.querySelector('#modal_upload_violation').style.display = "none";
    }
  };