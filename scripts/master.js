//Open login popup
document.getElementById('login').onclick = function(){
    open_L_popup()
};

function open_L_popup(){
    document.getElementById('login_pop').style.display = 'block'
}

//Close login popup
document.getElementById('login_cancel').onclick = function(){
    close_L_popup()
}

function close_L_popup(){
    document.getElementById('login_pop').style.display = 'none'
}

// When the user clicks anywhere outside of the modal, close it
var Lmodal = document.getElementById('login_pop');
window.onclick = function(event) {
    if (event.target == Lmodal) {
        Lmodal.style.display = "none";
    }
}





//Open signup popup
document.getElementById('signup').onclick = function(){
    open_S_popup()
};

function open_S_popup(){
    document.getElementById('signup_pop').style.display = 'block'
}

//Close signup popup
document.getElementById('signup_cancel').onclick = function(){
    close_S_popup()
}

function close_S_popup(){
    document.getElementById('signup_pop').style.display = 'none'
}

// When the user clicks anywhere outside of the modal, close it
var Smodal = document.getElementById('signup_pop');
window.onclick = function(event) {
    if (event.target == Smodal) {
        Smodal.style.display = "none";
    }
}
