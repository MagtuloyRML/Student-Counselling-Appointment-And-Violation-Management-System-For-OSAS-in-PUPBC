document.getElementById('bttnModalEntry').addEventListener('click', function() {
    document.querySelector('#modal_add_entry').style.display = 'flex';
});
document.querySelector('#close_modal').addEventListener('click', function(){
    document.querySelector('#modal_add_entry').style.display = 'none';
});

document.querySelector('#close_modal2').addEventListener('click', function(){
    document.querySelector('#modal_add_entry').style.display = 'none';
});


window.onclick = function(event) {
    if (event.target == document.querySelector('#modal_add_entry')) {
        document.querySelector('#modal_add_entry').style.display = "none";
    }
  };