document.getElementById('openModal_add_curriculum').addEventListener('click', function() {
    document.querySelector('#modal_curri_input').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_curri_input').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_curri_input').style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_curri_input')) {
        document.querySelector('#modal_curri_input').style.display = "none";
    }
  };