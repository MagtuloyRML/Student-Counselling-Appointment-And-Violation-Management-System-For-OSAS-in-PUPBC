document.getElementById('openModal_add_student').addEventListener('click', function() {
    document.querySelector('#modal_add_student').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_add_student').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_add_student').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_add_student')) {
        document.querySelector('#modal_add_student').style.display = "none";
    }
  };