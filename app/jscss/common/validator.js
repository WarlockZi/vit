function validate(type, str, input) {
    var errors = [];
    if (typeof str !== 'string') {
        errors.push('Vlidator : not string sent to Valigator!');
    }

    if (type === 'email') {
        let minlen = 5;
        if (str.length < minlen){
            errors.push(`Длина email должна быть не менее ${minlen}`);
            invalid(input, errors);
        }

        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (str.match(emailPattern)) {
            valid(input, errors);
        } else {
            errors.push( 'Проверьте пробелы, знак собачки @, наличие точки ');
            invalid(input, errors);
        }
    }else if (type === 'password') {
        var passwordPattern = /^(a-zA-Z0-9_\-])+$/;
        if (str.match(passwordPattern)) {
            valid(input, errors);
        } else {
            errors.push('Недопустимые символы в пароле');
            invalid(input, errors);
        }
    }
    var namePattern = /^[а-яА-Яa-zA-Z0-9!%&@#$\^*?_~+]+$/;
    return errors;
}

function valid(input, errors) {
    input.classList.add('valid');
    input.style.background = '#d6ffd8';

}
function invalid(input, errors) {
    input.style.background = '#ffeded';
}

export {validate};