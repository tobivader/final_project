
function open_L_popup(){
    document.getElementById('login_pop').style.display = 'block'
}
function close_L_popup(){
    document.getElementById('login_pop').style.display = 'none'
}
function open_S_popup(){
    document.getElementById('signup_pop').style.display = 'block'
}
function close_S_popup(){
    document.getElementById('signup_pop').style.display = 'none'
}

window.addEventListener("DOMContentLoaded", () =>{//Open login popup

    document.getElementById('login').onclick = function(){
    open_L_popup()
};

//Close login popup
document.getElementById('login_cancel').onclick = function(){
    close_L_popup()
}
//Open signup popup
document.getElementById('signup').onclick = function(){
    open_S_popup()
};
//Close signup popup
document.getElementById('signup_cancel').onclick = function(){
    close_S_popup()
}

// CLIENT-SIDE VALIDATION
// LOG IN
const login_form = document.querySelector("#main-form");
const login_username = document.querySelector('#username');
const login_password = document.querySelector('#password');
// SIGN UP
const form = document.getElementById('s_form');
const username = document.getElementById('s_username');
const email = document.getElementById('s_email');
const password = document.getElementById('s_password');
const rp_password = document.getElementById('s_rp_password');


form.addEventListener('submit', (e)=>{
});
});



