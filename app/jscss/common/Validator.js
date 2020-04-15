function valid(input, errors) {
    input.classList.add('valid');
    input.style.background = '#d6ffd8';

}
function invalid(input, errors) {
    errors.push('Проверьте введенный email');
    input.style.background = '#ffeded';
}

function validate(type, str, input) {
    var errors = [];
    if (typeof str !== 'string') {
        errors.push('Vlidator : not string sent to Valigator!');
    }

    if (type === 'email') {
        if (str.length < 5) {
            invalid(input, errors);
            // throw Error('Почта не менее 5 символов');
        }

        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (str.match(emailPattern)) {
            valid(input, errors);
        } else {
            invalid(input, errors);
        }
    } else if (type === 'password') {
        var passwordPattern = /^(a-zA-Z0-9_\-])+$/;
        if (str.match(passwordPattern)) {
            valid(input, errors);
        } else {
            errors.push('Недопустимые символы в пароле');
            invalid(input, errors);
        }
    }
    var namePattern = /^[а-яА-Яa-zA-Z0-9!%&@#$\^*?_~+]+$/;
    return error;
}


export {validate};