document.getElementById('openModal_addsanction').addEventListener('click', function() {
    document.querySelector('#modal_add_sanc_input').style.display = 'flex';
});
document.querySelector('#close_modal1').addEventListener('click', function(){
    document.querySelector('#modal_add_sanc_input').style.display = 'none';
});

document.querySelector('#close_modal3').addEventListener('click', function(){
    document.querySelector('#modal_add_sanc_input').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_add_sanc_input')) {
        document.querySelector('#modal_add_sanc_input').style.display = "none";
    }
  };