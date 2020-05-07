function validate(type, str, input) {
    let errors = [];
    typeof str !== 'string' &&
    errors.push('Vlidator : not string sent to Valigator!');


    if (type === 'email') {
        let emailPattern = /^[^ ]+[A-Za-z0-9]+@[^ ]+[A-Za-z0-9]+\.[a-z]{2,3}$/;
        let minlen = 5;

        str.length < minlen &&
        errors.push(`Длина email должна быть не менее ${minlen}`);

        !str.match(emailPattern) &&
        errors.push('Проверьте пробелы в начале почты, в начале домена, знак собачки @, наличие точки ');

        errors.length ? invalid(input) : valid(input);

    } else if (type === 'password') {
        let passwordPattern = /^[A-Za-z0-9_\-]+$/;
        let minlen = 5;

        !str.match(passwordPattern) &&
        errors.push('Недопустимые символы в пароле');

        str.length< minlen &&
        errors.push('Пароль менше 5 знаков');

        errors.length ? invalid(input) : valid(input);
    }
    let namePattern = /^[а-яА-Яa-zA-Z0-9!%&@#$\^*?_~+]+$/;
    console.table(errors);
    return errors;
}

function valid(input) {
    input.classList.add('valid');
    input.classList.remove('invalid');
}

function invalid(input) {
    input.classList.add('invalid');
    input.classList.remove('valid');
}

export {validate};