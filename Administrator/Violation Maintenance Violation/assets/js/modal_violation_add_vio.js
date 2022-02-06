document.getElementById('openModal_addviolation').addEventListener('click', function() {
    document.querySelector('#modal_add_viola_input').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_add_viola_input').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_add_viola_input').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_add_viola_input')) {
        document.querySelector('#modal_add_viola_input').style.display = "none";
    }
  };