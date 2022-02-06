document.getElementById('openModal_input_ay_details').addEventListener('click', function() {
    document.querySelector('#modal_ay_input').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_ay_input').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_ay_input').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_ay_input')) {
        document.querySelector('#modal_ay_input').style.display = "none";
    }
  };