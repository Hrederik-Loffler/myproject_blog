const form = document.getElementById('form');
const login  = document.getElementById('auth-login');
const password = document.getElementById('auth-password');




form.addEventListener('submit',e =>{
    
    checkInputs();
    if(login.value === '' || password.value === '') {
        e.preventDefault();
    } else {
        form.submit();
    }
})  


function checkInputs()
{
    const loginValue = login.value.trim();
    const passwordValue = password.value.trim();

    if(loginValue === '') {
        setErrorFor(login, 'Логин не может быть пустым!');
    } else {
        setSuccessFor(login);
    }

    if(passwordValue === '') {
        setErrorFor(password, 'Пароль не может быть пустым');
    } else {
        setSuccessFor(password);
    }

    return loginValue;

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
