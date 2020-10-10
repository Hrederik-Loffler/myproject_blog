const form = document.getElementById('form');
const login  = document.getElementById('auth-login');
const password = document.getElementById('auth-password');
const email = document.getElementById('auth-email');
const nickname = document.getElementById('auth-nickname');

// form.addEventListener('submit', e=>{
//     e.preventDefault();

//     checkInputs();
// })


form.addEventListener('submit',e =>{
    
    checkInputs();
    if(login.value === '' || password.value === '' || email.value === '' || nickname.value === '') {
        e.preventDefault();
    } else {
        form.submit();
    }
})  


function checkInputs()
{
    //trim to revome the whitespace
    const loginValue = login.value.trim();
    const passwordValue = password.value.trim();
    const emailValue = email.value.trim();
    const nicknameValue = nickname.value.trim();

    if(loginValue === '') {
        setErrorFor(login, 'Поле не может быть пустым!');
    } else {
        setSuccessFor(login);
    }

    if(passwordValue === '') {
        setErrorFor(password, 'Поле не может быть пустым!');
    } else {
        setSuccessFor(password);
    }

    if(emailValue === '') {
        setErrorFor(email, 'Поле не может быть пустым!');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Не верный формат');
    } else {
        setSuccessFor(email);
    }

    if(nicknameValue === '') {
        setErrorFor(nickname, 'Поле не может быть пустым!');
    } else {
        setSuccessFor(nickname);
    }
}

function setErrorFor (input, message) 
{
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    formGroup.className = 'form-group error';
    small.innerText = message;
}

function setSuccessFor(input)
{
    const formGroup = input.parentElement;
    formGroup.className = 'form-group success';
}

function isEmail(email)
{
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}