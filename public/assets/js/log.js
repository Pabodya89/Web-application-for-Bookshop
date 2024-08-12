// document.getElementById('passwordform').addEventListener('submit', function(event){
//     event.preventDefault();

//     const password = document.getElementById('password').value;
//     const message = document.getElementById('message');

//     if(checkPasswordStrength(password)){
//         message.textContent = 'Password is strong';
//         message.style.color = 'green';

//         event.target.reset();
//     }else{
//         message.textContent = 'Password is too weak';
//         message.style.color.color = 'red';
//     }
// });

// function checkPasswordStrength(password) {
//     const minLength = 8;
//     const hasUpperCase = /[A-Z]/.test(password);
//     const hasLowerCase = /[a-z]/.test(password);
//     const hasNumber = /[0-9]/.test(password);
//     const hasSpecialChar = /[!@#$%^&(),.?"{}<>]/.test(password);

//     return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar;
// }

// document.getElementById('togglePassword').addEventListener('click',function(){
//     const passwordInput = document.getElementById('password');
//     const togglePassword = document.getElementById('togglePassword');
//     const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
//     passwordInput.setAttribute('type', type);

//     togglePassword.textContent = type === 'password' ? '\u{1F441}' : '\u{1F441}';
// });

