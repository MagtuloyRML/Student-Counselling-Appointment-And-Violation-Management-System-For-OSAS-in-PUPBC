document.getElementById('openEditPicModal').addEventListener('click', function() {
    document.querySelector('#modal_edit_pic').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_edit_pic').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_edit_pic').style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_edit_pic')) {
        document.querySelector('#modal_edit_pic').style.display = "none";
    }
  };