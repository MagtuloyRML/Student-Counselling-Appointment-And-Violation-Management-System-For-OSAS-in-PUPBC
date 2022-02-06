document.getElementById('modal_editBTTN').addEventListener('click', function() {
    document.querySelector('#modal_curri_edit').style.display = 'flex';
});
document.querySelector('#close_modal4').addEventListener('click', function(){
    document.querySelector('#modal_curri_edit').style.display = 'none';
});

document.querySelector('#close_modal5').addEventListener('click', function(){
    document.querySelector('#modal_curri_edit').style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_curri_edit')) {
        document.querySelector('#modal_curri_edit').style.display = "none";
    }
  };