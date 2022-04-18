//Open login popup
document.getElementById('login').onclick = function(){
    open_popup()
};

function open_popup(){
    document.getElementById('login_pop').style.display = 'block'
}

//Close login popup
document.getElementById('cancel').onclick = function(){
    close_popup()
}

function close_popup(){
    document.getElementById('login_pop').style.display = 'none'
}






// Get the modal
var modal = document.getElementById('login_pop');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}








