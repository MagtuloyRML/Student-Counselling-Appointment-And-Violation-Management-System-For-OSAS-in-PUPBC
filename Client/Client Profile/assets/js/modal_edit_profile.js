document.getElementById('openEditProfModal').addEventListener('click', function() {
    document.querySelector('#modal_edit_prof').style.display = 'flex';
});
document.querySelector('#close_modal0').addEventListener('click', function(){
    document.querySelector('#modal_edit_prof').style.display = 'none';
});

document.querySelector('#close_modal9').addEventListener('click', function(){
    document.querySelector('#modal_edit_prof').style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_edit_prof')) {
        document.querySelector('#modal_edit_prof').style.display = "none";
        document.querySelector('#modal_edit_prof').style.zIndex = 'none';
    }
  };