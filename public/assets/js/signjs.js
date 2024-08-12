document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var strength = checkPasswordStrength(password);
    var strengthText;
    var strengthColor;

    switch(strength) {
        case 0:
            strengthText = 'Very Weak';
            strengthColor = 'red';
            break;
        case 1:
            strengthText = 'Weak';
            strengthColor = 'orange';
            break;
        case 2:
            strengthText = 'Moderate';
            strengthColor = 'yellow';
            break;
        case 3:
            strengthText = 'Strong';
            strengthColor = 'lightgreen';
            break;
        case 4:
            strengthText = 'Very Strong';
            strengthColor = 'green';
            break;
    }

    var strengthDiv = document.getElementById('passwordStrength');
    strengthDiv.textContent = strengthText;
    strengthDiv.style.color = strengthColor;
});

function checkPasswordStrength(password) {
    var strength = 0;

    if (password.length >= 8) {
        strength++;
    }
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
        strength++;
    }
    if (password.match(/\d/)) {
        strength++;
    }
    if (password.match(/[^a-zA-Z\d]/)) {
        strength++;
    }

    return strength;
}

