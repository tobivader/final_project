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




// CLIENT-SIDE VALIDATION
// SIGN UP
const form = document.getElementById('s_form');
const username = document.getElementById('s_username');
const email = document.getElementById('s_email');
const password = document.getElementById('s_password');
const rp_password = document.getElementById('s_rp_password');


form.addEventListener('submit', (e)=>{
    e.preventDefault();

    checkInputs();
});

function checkInputs(){
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const rp_passwordValue = rp_password.value.trim();

    // For Username
    if(usernameValue === ''){
        //set error class
        setErrorFor(username, 'Username cannot blank')

    }else{
        // add success class
        setSuccessFor(username)
    }
    // For Email
    if(emailValue === ''){
        //set error class
        setErrorFor(email, 'Email cannot blank')

    }else{
        // add success class
        setSuccessFor(email)
    }

    // For Password
    if(passwordValue === ''){
        //set error class
        setErrorFor(password, 'Password cannot blank')

    }else{
        // add success class
        setSuccessFor(password)
    }

    
    // For Password Check
    if(rp_passwordValue === ''){
        //set error class
        setErrorFor(rp_password, 'Password cannot blank')
    
    } else{

        setSuccessFor(rp_password)
    }


    
}
    

// 
function setErrorFor(input, message) {
	const formControl = input;
    formControl.className = 'error';

    const x = input.parentElement
	const small = x.querySelector('small')
	small.innerText = message;
}



function setSuccessFor(input){
    const formControl = input;
    formControl.className = 'success';

    const x = input.parentElement
    const small = x.querySelector('small')
    small.innerText = null;
}



// LOG IN





